<?php

namespace App\Http\Controllers\Store\Orders;

use App\Models\Order;
use App\Supervisors\OrderSupervisor;

class OrderController
{
    /**
     * Display a listing of the resource.
     */
    public function index(OrderSupervisor $orderSupervisor)
    {
        $orders = $orderSupervisor->readAll(
            auth()->user()
        );

        return view('pages.store.profile.orders.index', compact('orders'));
    }

    public function show(Order $order)
    {

    }
}
