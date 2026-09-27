<?php

namespace App\Http\Controllers\Store\Products;

class WishlistController
{
    public function index()
    {

        $user = auth()->user();
        $products = $user->likedProducts()->with(['primaryImage', 'category'])->latest()->paginate(10);

        return view('pages.store.wishlist.index', compact('products'));
    }
}
