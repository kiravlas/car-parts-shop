<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderRequest;
use Illuminate\Support\Facades\Storage;

class OrderController
{


    public function store(OrderRequest $request)
    {
        Storage::append(
            'orders.txt',
            $request->email.' - '.$request->product_name
        );

        return response()->json([
            'status' => 'success',
            'message' => 'Order has been stored',
        ]);
    }
}
