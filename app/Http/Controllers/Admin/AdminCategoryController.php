<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\Category\StoreCategoryRequest;
use App\Http\Requests\Admin\Category\UpdateCategoryRequest;
use App\Models\Category;
use App\Supervisors\CategorySupervisor;

class AdminCategoryController
{
    public function __construct(protected CategorySupervisor $supervisor) {}

    public function index()
    {
        $categories = $this->supervisor->adminCategoriesList(10);

        return view('pages.admin.categories.index', compact('categories'));
    }

    public function store(StoreCategoryRequest $request)
    {
        $this->supervisor->storeCategory($request->validated());

        return redirect()
            ->route('admin.categories.index')
            ->with('success', 'Category created successfully!');
    }

    public function create()
    {
        $categories = $this->supervisor->readAll();

        return view('pages.admin.categories.create', compact('categories'));
    }

    public function edit(Category $category)
    {
        return view('pages.admin.categories.edit', compact('category'));
    }

    public function update(UpdateCategoryRequest $request, Category $category)
    {
        $this->supervisor->updateCategory($category, $request->validated());

        return redirect()
            ->route('admin.categories.index')
            ->with('success', 'Category updated successfully!');
    }

    public function destroy(Category $category)
    {
        $this->supervisor->deleteCategory($category);

        return redirect()
            ->route('admin.categories.index')
            ->with('success', 'Category deleted successfully!');
    }
}
