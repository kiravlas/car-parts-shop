<?php

namespace App\Http\Controllers\Store\Cart;

use App\Models\CartItem;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController
{
    /**
     * Display the user's cart.
     */
    public function index()
    {
        $cartItems = Auth::user()
            ->cartItems()
            ->with([
                'product.primaryImage',
                'product.category',
            ])
            ->get();

        $grandTotal = $cartItems->sum(function ($item) {
            $activePrice = $item->product->sale_price
                ?? $item->product->price;

            return $activePrice * $item->quantity;
        });

        return view(
            'pages.store.cart.index',
            compact(
                'cartItems',
                'grandTotal'
            )
        );
    }


    /**
     * Add a product to the cart.
     */
    public function store(Request $request)
    {
        $request->validate([
            'product_id' => [
                'required',
                'exists:products,id',
            ],

            'quantity' => [
                'required',
                'integer',
                'min:1',
            ],
        ]);

        $productId = $request->input('product_id');

        $quantity = (int) $request->input(
            'quantity',
            1
        );

        $user = Auth::user();

        $product = Product::findOrFail(
            $productId
        );

        $cartItem = $user
            ->cartItems()
            ->where(
                'product_id',
                $productId
            )
            ->first();

        if ($cartItem) {

            $cartItem->increment(
                'quantity',
                $quantity
            );

        } else {

            $user->cartItems()->create([
                'product_id' => $productId,
                'quantity' => $quantity,
            ]);

        }

        return redirect()
            ->route(
                'product.show',
                [
                    'product' => $product->slug,
                ]
            )
            ->with(
                'success',
                'Product added to your cart successfully!'
            );
    }


    /**
     * Update a cart item's quantity.
     */
    public function update(
        Request $request,
        CartItem $cartItem
    ) {
        if ($cartItem->user_id !== Auth::id()) {

            return response()->json([
                'error' => 'Unauthorized action.',
            ], 403);

        }

        $cartItem->load('product');

        $request->validate([
            'quantity' => [
                'required',
                'integer',
                'min:1',
                'max:'.$cartItem->product->stock,
            ],
        ]);

        $quantity = (int) $request->input(
            'quantity'
        );

        $cartItem->update([
            'quantity' => $quantity,
        ]);

        $freshCartItems = Auth::user()
            ->cartItems()
            ->with('product')
            ->get();

        $grandTotal = $freshCartItems->sum(
            function ($item) {

                $activePrice =
                    $item->product->sale_price
                    ?? $item->product->price;

                return $activePrice * $item->quantity;
            }
        );

        $activePrice =
            $cartItem->product->sale_price
            ?? $cartItem->product->price;

        return response()->json([

            'success' => true,

            'itemSubtotal' => number_format(
                $activePrice * $cartItem->quantity,
                2
            ),

            'grandTotal' => number_format(
                $grandTotal,
                2
            ),

            // Number of cart rows/products
            'cartItemCount' =>
                $freshCartItems->count(),

            // Total quantity of everything
            'cartQuantity' =>
                $freshCartItems->sum('quantity'),

            'cartIsEmpty' =>
                $freshCartItems->isEmpty(),
        ]);
    }


    /**
     * Remove a cart item.
     */
    public function destroy(
        CartItem $cartItem
    ) {
        if ($cartItem->user_id !== Auth::id()) {

            return response()->json([
                'error' => 'Unauthorized action.',
            ], 403);

        }

        $cartItem->delete();

        $freshCartItems = Auth::user()
            ->cartItems()
            ->with('product')
            ->get();

        $grandTotal = $freshCartItems->sum(
            function ($item) {

                $activePrice =
                    $item->product->sale_price
                    ?? $item->product->price;

                return $activePrice * $item->quantity;
            }
        );

        return response()->json([

            'success' => true,

            'grandTotal' => number_format(
                $grandTotal,
                2
            ),

            // Number of remaining cart rows
            'cartItemCount' =>
                $freshCartItems->count(),

            // Total quantity remaining
            'cartQuantity' =>
                $freshCartItems->sum('quantity'),

            'cartIsEmpty' =>
                $freshCartItems->isEmpty(),
        ]);
    }
}
