<?php

namespace App\Http\Controllers;

class ProductController
{
    public function show($product)
    {
        return view('pages.products.show', compact('product'));
    }
}
