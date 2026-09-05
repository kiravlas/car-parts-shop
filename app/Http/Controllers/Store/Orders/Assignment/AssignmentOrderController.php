<?php

namespace App\Http\Controllers\Store\Orders\Assignment;

use App\Http\Requests\Store\Assignment\AssignmentOrderCreateRequest;
use Illuminate\Support\Facades\Storage;

class AssignmentOrderController
{
    public function store(AssignmentOrderCreateRequest $request)
    {
        ['email' => $email, 'product_name' => $productName] = $request->validated();

        Storage::append('orders.txt', $email.' - '.$productName);

        return response()->json([
            'status' => 'success',
            'message' => 'Order has been stored',
        ]);
    }
}
