<?php

namespace App\Http\Controllers\Store\Cart;

use App\Http\Requests\Store\Cart\StoreCartRequest;
use App\Http\Requests\Store\Cart\UpdateCartRequest;
use App\Models\CartItem;
use App\Models\Product;
use App\Supervisors\CartSupervisor;
use Illuminate\Support\Facades\Auth;

class CartController
{
    public function __construct(
        protected CartSupervisor $cartSupervisor
    ) {}

    /**
     * Display the user's cart.
     */
    public function index()
    {
        $user = Auth::user();
        $cartItems = $this->cartSupervisor
            ->getCartItemsForAuthenticatedUser($user);
        $grandTotal = $this->cartSupervisor
            ->calculateCartItemsGrandTotal($cartItems);

        return view(
            'pages.store.cart.index',
            compact('cartItems', 'grandTotal')
        );
    }

    public function store(StoreCartRequest $request)
    {
        $productId = (int) $request->input('product_id');
        $quantity = (int) $request->input('quantity', 1);
        $this->cartSupervisor->storeItemInCart(
            Auth::user(),
            $productId,
            $quantity
        );
        $product = Product::findOrFail($productId);

        return redirect()
            ->route('products.show', [
                'product' => $product->slug,
            ])
            ->with(
                'success',
                'Product added to your cart successfully!'
            );
    }

    public function update(
        UpdateCartRequest $request,
        CartItem $cartItem
    ) {
        $user = Auth::user();
        $quantity = (int) $request->validated('quantity');
        $this->cartSupervisor->updateItem(
            $user,
            $cartItem,
            $quantity
        );
        $summary = $this->cartSupervisor->getCartSummary($user);

        return response()->json([
            'success' => true,
            'itemSubtotal' => number_format(
                $this->cartSupervisor->calculateItemSubtotal($cartItem),
                2
            ),
            'grandTotal' => number_format(
                $summary['grandTotal'],
                2
            ),
            'cartItemCount' => $summary['cartItemCount'],
            'cartQuantity' => $summary['cartQuantity'],
            'cartIsEmpty' => $summary['cartIsEmpty'],
        ]);
    }

    public function destroy(CartItem $cartItem)
    {
        $user = Auth::user();
        $this->cartSupervisor->removeItem(
            $user,
            $cartItem
        );
        $summary = $this->cartSupervisor->getCartSummary($user);

        return response()->json([
            'success' => true,
            'grandTotal' => number_format(
                $summary['grandTotal'],
                2
            ),
            'cartItemCount' => $summary['cartItemCount'],
            'cartQuantity' => $summary['cartQuantity'],
            'cartIsEmpty' => $summary['cartIsEmpty'],
        ]);
    }
}
