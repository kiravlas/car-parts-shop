<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Contracts\View\View;

class CategoryController
{
    function show($category): View
    {
        return view('pages.store.categories.show', compact('category'));
    }

    function index(): View
    {
        $categories = Category::whereNull('parent_id')
            ->with('children')
            ->orderBy('name')
            ->get();
        return view('pages.store.categories.index', compact('categories'));
    }
}
