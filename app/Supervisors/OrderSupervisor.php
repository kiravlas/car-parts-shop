<?php

namespace App\Supervisors;

use App\Models\Order;
use App\Models\User;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use LaravelIdea\Helper\App\Models\_IH_Order_C;

class OrderSupervisor
{
    public function createFromCart(
        User       $user,
        Collection $cartItems,
                   $grandTotal,
        string     $sessionId
    ): Order
    {
        $order = Order::create([
            'user_id' => $user->id,
            'total_amount' => (int)round($grandTotal * 100),
            'status' => 'processing',
            'shipping_address' => 'Customer Pickup / Standard Delivery Address Placeholder',
            'stripe_payment_id' => $sessionId,
        ]);

        foreach ($cartItems as $item) {
            $unitPrice = $item->product->sale_price
                ?? $item->product->price;

            $order->orderItems()->create([
                'product_id' => $item->product_id,
                'product_name' => $item->product->name,
                'price' => (int)round($unitPrice * 100),
                'quantity' => $item->quantity,
            ]);

            $item->product->decrement(
                'stock',
                $item->quantity
            );
        }

        return $order;
    }

    public function getLatestOrders(User $user, $amount = 3): Collection
    {
        return $user->orders()
            ->select('id', 'user_id', 'created_at', 'status', 'total_amount')
            ->latest()
            ->take($amount)
            ->get();
    }

    public function readAll(User $user, $perPage = 10): array|_IH_Order_C|LengthAwarePaginator
    {
        return $user->orders()
            ->select('id', 'user_id', 'created_at', 'status', 'total_amount')
            ->latest()
            ->paginate($perPage);
    }
}
