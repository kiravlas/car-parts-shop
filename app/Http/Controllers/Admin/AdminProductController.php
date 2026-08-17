<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\Product\StoreProductRequest;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Support\Str;

class AdminProductController
{
    public function index()
    {
        $products = Product::with(['category', 'primaryImage'])->latest()->paginate(10);
        return view('pages.admin.products.index', compact('products'));
    }

    public function store(StoreProductRequest $request)
    {

        $data = collect($request->validated())->except('images')->toArray();

        $images = $request->file('images', []);

        $data['slug'] = Str::slug($data['name']);

        $product = Product::create($data);

        foreach ($images as $index => $imageFile) {
            $storedPath = $imageFile->store('products', 'public');

            ProductImage::create([
                'product_id' => $product->id,
                'image_path' => $storedPath,
                'is_primary' => $index === 0,
            ]);
        }

        return redirect()
            ->route('admin.products.index')
            ->with('success', 'Product and its images uploaded successfully!');
    }

    public function create()
    {
        $categories = Category::orderBy('name', 'asc')->get();
        return view('pages.admin.products.create', compact('categories'));
    }

    public function update()
    {
        //
    }

    public function edit(Product $product)
    {
        $categories = Category::orderBy('name', 'asc')->get();
        $product->load('images');
        return view('pages.admin.products.edit', compact('categories', 'product'));
    }

    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()
            ->route('admin.products.index')
            ->with('success', 'Product deleted successfully!');
    }
}
