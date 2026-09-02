<?php

namespace App\Http\Controllers\Store\Products;

use App\Filters\ProductFilter;
use App\Models\Category;
use App\Models\Product;

class ProductController
{
    public function show(Product $product)
    {

        $product->load('images');

        return view('pages.store.products.show', compact('product'));
    }

    public function index(ProductFilter $filter)
    {

        $products = Product::query()
            ->with('primaryImage', 'category')
            ->filter($filter)
            ->paginate(6)
            ->withQueryString();

        $categories = Category::whereNull('parent_id')
            ->with('children')
            ->orderBy('name', 'asc')
            ->get();

        return view(
            'pages.store.products.index',
            compact('products', 'categories')
        );
    }
}
