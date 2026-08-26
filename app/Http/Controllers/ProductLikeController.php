<?php

namespace App\Http\Controllers;

use App\Models\Product;

class ProductLikeController
{
    public function toggle(Product $product)
    {
        $user = auth()->user();

        $user->likedProducts()->toggle($product->id);

        return response()->json([
            'success' => true,
            'is_liked' => $product->isLikedByAuthUser(),
            'likes_count' => $product->likedByUsers()->count(),
            'total_wishlist_count' => auth()->user()->likedProducts()->count(),
            'productId' => $product->id
        ]);
    }
}
