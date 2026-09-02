<?php

namespace App\Http\Controllers\Store\Categories;

use App\Models\Category;
use Illuminate\Contracts\View\View;

class CategoryController
{
    function index(): View
    {
        $categories = Category::whereNull('parent_id')
            ->with('children')
            ->orderBy('name')
            ->get();
        return view('pages.store.categories.index', compact('categories'));
    }
}
