<?php

namespace App\Http\Controllers\Store\Checkout;

use App\Models\Order;
use App\Models\OrderItem;
use Exception;
use Illuminate\Support\Facades\Log;
use Stripe\Exception\ApiErrorException;
use Stripe\StripeClient;

class CheckoutController
{
    public function success()
    {
        $user = auth()->user();

        $sessionId = request()->query('session_id');

        if (!$sessionId) {
            return redirect()->route('cart.index')->with('error', 'Invalid checkout verification link.');
        }

        $orderExists = Order::where('stripe_payment_id', $sessionId)->exists();
        if ($orderExists) {
            return view('pages.store.checkout.success');
        }

        $stripe = new StripeClient(config('services.stripe.secret'));

        try {
            $session = $stripe->checkout->sessions->retrieve($sessionId);

            if ($session->payment_status !== 'paid') {
                return redirect()->route('cart.index')->with('error', 'The payment verification cycle was not authorized.');
            }
        } catch (Exception $e) {
            Log::error('Stripe token validation failure: ' . $e->getMessage());
            return redirect()->route('cart.index')->with('error', 'We encountered an issue confirming your payment transaction.');
        }

        $cartItems = $user->cartItems()->with('product')->get();

        if ($cartItems->isEmpty()) {
            return view('pages.store.checkout.success');
        }

        $grandTotal = $cartItems->sum(function ($item) {
            $activePrice = $item->product->sale_price ?? $item->product->price;
            return $activePrice * $item->quantity;
        });

        $order = Order::create([
            'user_id' => $user->id,
            'total_amount' => (int)round($grandTotal * 100),
            'status' => 'processing',
            'shipping_address' => 'Customer Pickup / Standard Delivery Address Placeholder',
            'stripe_payment_id' => $sessionId,
        ]);

        foreach ($cartItems as $item) {
            $unitPrice = $item->product->sale_price ?? $item->product->price;

            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $item->product_id,
                'product_name' => $item->product->name,
                'price' => (int)round($unitPrice * 100),
                'quantity' => $item->quantity,
            ]);

            $item->product->decrement('stock', $item->quantity);
        }

        $user->cartItems()->delete();

        return view('pages.store.checkout.success');
    }

    public function checkout()
    {
        $user = auth()->user();
        $stripe = new StripeClient(config('services.stripe.secret'));

        $cartItems = $user->cartItems()->with('product.primaryImage')->get();

        if ($cartItems->isEmpty()) {
            return redirect()
                ->route('cart.index')
                ->with('error', 'Your shopping cart is empty.');
        }
        $lineItems = [];
        foreach ($cartItems as $item) {
            $productPrice = $item->product->sale_price ?? $item->product->price;

            $lineItems[] = [
                'price_data' => [
                    'currency' => 'usd',
                    'unit_amount' => (int)round($productPrice * 100),
                    'product_data' => [
                        'name' => $item->product->name,
                        'description' => $item->product->description ?? 'Car part configuration asset',
                    ],
                ],
                'quantity' => $item->quantity,
            ];
        }
        try {
            $checkoutSession = $stripe->checkout->sessions->create([
                'payment_method_types' => ['card'],
                'customer_email' => $user->email,
                'line_items' => $lineItems,
                'mode' => 'payment',
                'success_url' => route('checkout.success') . '?session_id={CHECKOUT_SESSION_ID}',
                'cancel_url' => route('checkout.cancel'),
            ]);

            return redirect()->away($checkoutSession->url);
        } catch (ApiErrorException $e) {
            Log::error('Status: ' . $e->getHttpStatus() . ', Code: ' . $e->getStripeCode() .
                ', Message: ' . $e->getMessage() . ', Request ID: ' . $e->getRequestId());

            return redirect()
                ->route('cart.index')
                ->with('error', 'We encountered an error processing your checkout setup. Please try again.');
        } catch (Exception $e) {
            Log::error('Another problem occurred.');

            return redirect()
                ->route('cart.index')
                ->with('error', 'We encountered an error processing your checkout setup. Please try again.');
        }

    }

    public function cancel()
    {
        return view('pages.store.checkout.cancel');
    }
}
