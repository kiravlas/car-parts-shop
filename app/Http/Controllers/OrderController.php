<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderCreateRequest;
use Illuminate\Support\Facades\Storage;

class OrderController
{
    public function store(OrderCreateRequest $request)
    {
        ['email' => $email, 'product_name' => $productName] = $request->validated();

        Storage::append('orders.txt', $email.' - '.$productName);

        return response()->json([
            'status' => 'success',
            'message' => 'Order has been stored',
        ]);
    }
}
