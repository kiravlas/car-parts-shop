<?php

namespace App\Http\Controllers\Store\Categories;

use App\Supervisors\CategorySupervisor;
use Illuminate\Contracts\View\View;

class CategoryController
{
    public function index(CategorySupervisor $supervisor): View
    {
        $categories = $supervisor->readAll();

        return view('pages.store.categories.index', compact('categories'));
    }
}
