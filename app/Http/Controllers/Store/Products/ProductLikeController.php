<?php

namespace App\Http\Controllers\Store\Products;

use App\Models\Product;
use App\Supervisors\ProductSupervisor;
use Illuminate\Http\JsonResponse;

class ProductLikeController
{
    public function toggle(Product $product, ProductSupervisor $supervisor): JsonResponse
    {
        $stats = $supervisor->toggleLike(auth()->user(), $product);

        return response()->json([
            'success' => true,
            'is_liked' => $stats['is_liked'],
            'likes_count' => $stats['likes_count'],
            'total_wishlist_count' => $stats['total_wishlist_count'],
            'productId' => $product->id,
        ]);
    }
}
