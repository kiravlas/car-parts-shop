<?php

namespace App\Http\Controllers\Store\Products;

use App\Models\Product;
use Illuminate\Http\JsonResponse;

class ProductLikeController
{
    public function toggle(Product $product): JsonResponse
    {
        $user = auth()->user();

        $isCurrentlyLiked = $user->likedProducts()
            ->where('products.id', $product->id)
            ->exists();


        if ($isCurrentlyLiked) {

            $user->likedProducts()->detach($product->id);

            $isLiked = false;

        } else {

            $user->likedProducts()->attach($product->id);

            $isLiked = true;

        }


        $likesCount = $product->likedByUsers()->count();

        $totalWishlistCount = $user->likedProducts()->count();


        return response()->json([
            'success' => true,
            'is_liked' => $isLiked,
            'likes_count' => $likesCount,
            'total_wishlist_count' => $totalWishlistCount,
            'productId' => $product->id,
        ]);
    }
}
