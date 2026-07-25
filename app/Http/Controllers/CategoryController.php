<?php

namespace App\Http\Controllers;

class CategoryController
{
    function show($category)
    {
        return view('categories.show', compact('category'));
    }
}
