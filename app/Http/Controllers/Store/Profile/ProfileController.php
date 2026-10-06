<?php

namespace App\Http\Controllers\Store\Profile;

use App\Supervisors\OrderSupervisor;

class ProfileController
{
    public function show(OrderSupervisor $orderSupervisor)
    {
        $latestThreeOrders = $orderSupervisor->getLatestOrders(auth()->user());

        return view('pages.store.profile.show', compact('latestThreeOrders'));
    }

    public function edit()
    {
        return view('pages.store.profile.edit');
    }

    public function security()
    {
        return view('pages.store.profile.security');
    }
}
