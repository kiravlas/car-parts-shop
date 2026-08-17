<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;

class CategoryController
{
    function show($category): View
    {
        return view('pages.store.categories.show', compact('category'));
    }
}
