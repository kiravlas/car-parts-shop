<?php

namespace App\Http\Controllers\Store\Checkout;

use App\Supervisors\CheckoutSupervisor;
use Illuminate\Support\Facades\Auth;

class CheckoutController
{
    public function __construct(
        protected CheckoutSupervisor $checkoutSupervisor
    ) {}

    public function checkout()
    {
        $result = $this->checkoutSupervisor->createCheckoutSession(
            Auth::user()
        );

        if ($result['error']) {
            return redirect()
                ->route('cart.index')
                ->with('error', $result['error']);
        }

        return redirect()->away($result['url']);
    }

    public function success()
    {
        $sessionId = request()->query('session_id');

        if (! $sessionId) {
            return redirect()
                ->route('cart.index')
                ->with(
                    'error',
                    'Invalid checkout verification link.'
                );
        }

        $result = $this->checkoutSupervisor->completeCheckout(
            Auth::user(),
            $sessionId
        );

        if ($result['redirect']) {
            return redirect()
                ->route('cart.index')
                ->with('error', $result['error']);
        }

        return view('pages.store.checkout.success');
    }

    public function cancel()
    {
        return view('pages.store.checkout.cancel');
    }
}
