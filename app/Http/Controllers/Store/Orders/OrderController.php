<?php

namespace App\Http\Controllers\Store\Orders;

class OrderController
{
    public function index()
    {
        $orders = auth()->user()->orders()
            ->select('id', 'user_id', 'total_amount', 'status', 'created_at')
            ->with('orderItems')
            ->latest()
            ->paginate(10);

        return view('pages.store.profile.orders', compact('orders'));
    }
}
