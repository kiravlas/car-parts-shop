<?php

namespace App\Http\Controllers\Store;

use App\Supervisors\ProductSupervisor;
use Illuminate\Contracts\View\View;

class HomeController
{
    public function index(ProductSupervisor $supervisor): View
    {
        $topSaleProducts = $supervisor->getTopSales(10);
        $onSaleProducts = $supervisor->getOnSale(10);
        $newArrivalsProducts = $supervisor->getNewArrivals(10);

        return view('pages.store.home.index', compact('topSaleProducts', 'onSaleProducts',
            'newArrivalsProducts'));
    }
}
