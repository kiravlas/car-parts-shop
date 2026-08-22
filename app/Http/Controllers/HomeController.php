<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Contracts\View\View;

class HomeController
{
    public function index(): View
    {
        $topSaleProducts = Product::query()
            ->where('total_sales', '>=', 100)
            ->orderByDesc('created_at')
            ->with('primaryImage')
            ->take(10)
            ->get();

        $onSaleProducts = Product::query()
            ->whereNotNull('sale_price')
            ->orderByDesc('created_at')
            ->with('primaryImage')
            ->take(10)
            ->get();

        $newArrivalsProducts = Product::query()
            ->where('is_new_arrival', true)
            ->orderByDesc('created_at')
            ->with('primaryImage')
            ->take(10)
            ->get();

        return view('pages.store.home.index', compact('topSaleProducts', 'onSaleProducts', 'newArrivalsProducts'));
    }
}
