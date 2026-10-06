<?php

namespace App\Http\Controllers\Store\Products;

use App\Filters\ProductFilter;
use App\Models\Product;
use App\Supervisors\CategorySupervisor;
use App\Supervisors\ProductSupervisor;

class ProductController
{
    public function show(Product $product, ProductSupervisor $productSupervisor)
    {
        $productSupervisor->loadSingleProductImage($product);

        return view('pages.store.products.show', compact('product'));
    }

    public function index(ProductFilter $filter, CategorySupervisor $categoriesSupervisor, ProductSupervisor $productSupervisor)
    {
        $products = $productSupervisor->listProducts($filter, 6);
        $categories = $categoriesSupervisor->readAll();

        return view('pages.store.products.index', compact('products', 'categories'));
    }
}
