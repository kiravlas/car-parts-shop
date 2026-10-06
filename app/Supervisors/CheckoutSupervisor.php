<?php

namespace App\Supervisors;

use App\Models\Order;
use App\Models\User;
use Exception;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Stripe\Checkout\Session;
use Stripe\Exception\ApiErrorException;
use Stripe\StripeClient;
use Throwable;

class CheckoutSupervisor
{
    public function __construct(
        protected OrderSupervisor $orderSupervisor
    ) {}

    public function createCheckoutSession(User $user): array
    {
        $cartItems = $user
            ->cartItems()
            ->with('product.primaryImage')
            ->get();

        if ($cartItems->isEmpty()) {
            return [
                'error' => 'Your shopping cart is empty.',
                'url' => null,
            ];
        }

        $lineItems = [];

        foreach ($cartItems as $item) {
            $productPrice = $item->product->sale_price
                ?? $item->product->price;

            $lineItems[] = [
                'price_data' => [
                    'currency' => 'usd',
                    'unit_amount' => (int) round($productPrice * 100),
                    'product_data' => [
                        'name' => $item->product->name,
                        'description' => $item->product->description
                            ?? 'Car part configuration asset',
                    ],
                ],
                'quantity' => $item->quantity,
            ];
        }

        $stripe = new StripeClient(
            config('services.stripe.secret')
        );

        try {
            $checkoutSession = $stripe->checkout->sessions->create([
                'payment_method_types' => ['card'],
                'customer_email' => $user->email,
                'line_items' => $lineItems,
                'mode' => 'payment',
                'success_url' => route('checkout.success')
                    .'?session_id={CHECKOUT_SESSION_ID}',
                'cancel_url' => route('checkout.cancel'),
            ]);

            return [
                'error' => null,
                'url' => $checkoutSession->url,
            ];
        } catch (ApiErrorException $e) {
            Log::error(
                'Stripe API error during checkout creation.',
                [
                    'status' => $e->getHttpStatus(),
                    'code' => $e->getStripeCode(),
                    'message' => $e->getMessage(),
                    'request_id' => $e->getRequestId(),
                ]
            );

            return [
                'error' => 'We encountered an error processing your checkout setup. Please try again.',
                'url' => null,
            ];
        } catch (Exception $e) {
            Log::error(
                'Unexpected error during checkout creation.',
                [
                    'message' => $e->getMessage(),
                ]
            );

            return [
                'error' => 'We encountered an error processing your checkout setup. Please try again.',
                'url' => null,
            ];
        }
    }

    /**
     * @throws Throwable
     */
    public function completeCheckout(
        User $user,
        string $sessionId
    ): array {
        if ($this->orderAlreadyExists($sessionId)) {
            return [
                'redirect' => false,
                'error' => null,
            ];
        }

        $session = $this->retrievePaidStripeSession($sessionId);

        if (! $session) {
            return [
                'redirect' => true,
                'error' => 'We encountered an issue confirming your payment transaction.',
            ];
        }

        $cartItems = $user
            ->cartItems()
            ->with('product')
            ->get();

        if ($cartItems->isEmpty()) {
            return [
                'redirect' => false,
                'error' => null,
            ];
        }

        $grandTotal = $this->calculateGrandTotal($cartItems);

        DB::transaction(function () use (
            $user,
            $cartItems,
            $grandTotal,
            $sessionId
        ) {
            $this->orderSupervisor->createFromCart(
                $user,
                $cartItems,
                $grandTotal,
                $sessionId
            );

            $user->cartItems()->delete();
        });

        return [
            'redirect' => false,
            'error' => null,
        ];
    }

    protected function orderAlreadyExists(string $sessionId): bool
    {
        return Order::where(
            'stripe_payment_id',
            $sessionId
        )->exists();
    }

    protected function retrievePaidStripeSession(
        string $sessionId
    ): ?Session {
        $stripe = new StripeClient(
            config('services.stripe.secret')
        );

        try {
            $session = $stripe
                ->checkout
                ->sessions
                ->retrieve($sessionId);

            if ($session->payment_status !== 'paid') {
                return null;
            }

            return $session;
        } catch (Exception $e) {
            Log::error(
                'Stripe payment verification failed.',
                [
                    'message' => $e->getMessage(),
                    'session_id' => $sessionId,
                ]
            );

            return null;
        }
    }

    protected function calculateGrandTotal(
        Collection $cartItems
    ) {
        return $cartItems->sum(function ($item) {
            $activePrice = $item->product->sale_price
                ?? $item->product->price;

            return $activePrice * $item->quantity;
        });
    }
}
