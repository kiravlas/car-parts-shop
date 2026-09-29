<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\Product\StoreProductRequest;
use App\Http\Requests\Admin\Product\UpdateProductRequest;
use App\Models\Product;
use App\Models\ProductImage;
use App\Supervisors\CategorySupervisor;
use App\Supervisors\ProductSupervisor;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class AdminProductController
{
    public function __construct(
        protected ProductSupervisor $supervisor
    ) {}

    public function index(): View
    {
        $products = $this->supervisor->adminProductsList(10);

        return view('pages.admin.products.index', compact('products'));
    }

    public function create(CategorySupervisor $categorySupervisor): View
    {
        $categories = $categorySupervisor->readAll();

        return view('pages.admin.products.create', compact('categories'));
    }

    public function store(StoreProductRequest $request): RedirectResponse
    {
        $this->supervisor->storeProduct(
            $request->validated(),
            $request->file('images', [])
        );

        return redirect()
            ->route('admin.products.index')
            ->with('success', 'Product and its images uploaded successfully!');
    }

    public function edit(Product $product, CategorySupervisor $categorySupervisor): View
    {
        $categories = $categorySupervisor->readAll();
        $product = $this->supervisor->loadProductWithSortedImages($product);

        return view('pages.admin.products.edit', compact('categories', 'product'));
    }

    public function update(UpdateProductRequest $request, Product $product): RedirectResponse
    {
        $this->supervisor->updateProduct(
            $product,
            $request->validated(),
            $request->file('images', [])
        );

        return redirect()
            ->route('admin.products.index')
            ->with('success', 'Product updated successfully!');
    }

    public function destroy(Product $product): RedirectResponse
    {
        $this->supervisor->destroyProduct($product);

        return redirect()
            ->route('admin.products.index')
            ->with('success', 'Product deleted successfully!');
    }

    public function setPrimaryImage(ProductImage $image): RedirectResponse
    {
        $this->supervisor->setPrimaryImage($image);

        return back()->with('success', 'Primary main display image changed successfully!');
    }

    public function destroyImage(ProductImage $image): RedirectResponse
    {
        $this->supervisor->removeImage($image);

        return back()->with('success', 'Image removed successfully.');
    }
}
