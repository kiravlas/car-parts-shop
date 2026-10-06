<?php

namespace App\Supervisors;

use App\Models\CartItem;
use App\Models\User;
use Illuminate\Support\Collection;
use Illuminate\Validation\ValidationException;

class CartSupervisor
{
    public function getCartItemsForAuthenticatedUser(User $user): Collection
    {
        return $user
            ->cartItems()
            ->with([
                'product.primaryImage',
                'product.category',
            ])
            ->get();
    }

    public function storeItemInCart(
        User $user,
        int $productId,
        int $quantity
    ): void {
        $cartItem = $user
            ->cartItems()
            ->where('product_id', $productId)
            ->first();

        if ($cartItem) {
            $cartItem->increment('quantity', $quantity);

            return;
        }

        $user->cartItems()->create([
            'product_id' => $productId,
            'quantity' => $quantity,
        ]);
    }

    public function updateItem(
        User $user,
        CartItem $cartItem,
        int $quantity
    ): void {
        $this->ensureUserOwnsCartItem($user, $cartItem);

        $cartItem->load('product');

        if ($quantity > $cartItem->product->stock) {
            throw ValidationException::withMessages([
                'quantity' => 'The requested quantity exceeds available stock.',
            ]);
        }

        $cartItem->update([
            'quantity' => $quantity,
        ]);
    }

    protected function ensureUserOwnsCartItem(
        User $user,
        CartItem $cartItem
    ): void {
        if ($cartItem->user_id !== $user->id) {
            abort(403, 'Unauthorized action.');
        }
    }

    public function removeItem(
        User $user,
        CartItem $cartItem
    ): void {
        $this->ensureUserOwnsCartItem($user, $cartItem);

        $cartItem->delete();
    }

    public function getCartSummary(User $user): array
    {
        $cartItems = $user
            ->cartItems()
            ->with('product')
            ->get();

        return [
            'grandTotal' => $this->calculateCartItemsGrandTotal($cartItems),
            'cartItemCount' => $cartItems->count(),
            'cartQuantity' => $cartItems->sum('quantity'),
            'cartIsEmpty' => $cartItems->isEmpty(),
        ];
    }

    public function calculateCartItemsGrandTotal(Collection $cartItems)
    {
        return $cartItems->sum(function ($item) {
            $activePrice = $item->product->sale_price
                ?? $item->product->price;

            return $activePrice * $item->quantity;
        });
    }

    public function calculateItemSubtotal(CartItem $cartItem): float|int
    {
        $activePrice = $cartItem->product->sale_price
            ?? $cartItem->product->price;

        return $activePrice * $cartItem->quantity;
    }
}
