<?php

namespace App\Http\Controllers\Store\Products;

use App\Supervisors\WishlistSupervisor;

class WishlistController
{
    public function index(WishlistSupervisor $wishlistSupervisor)
    {
        $products = $wishlistSupervisor->readAll(auth()->user(), 10);

        return view('pages.store.wishlist.index', compact('products'));
    }
}
