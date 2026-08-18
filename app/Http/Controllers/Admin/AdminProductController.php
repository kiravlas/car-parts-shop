<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\Product\StoreProductRequest;
use App\Http\Requests\Admin\Product\UpdateProductRequest;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class AdminProductController
{
    public function index()
    {
        $products = Product::with(['category', 'primaryImage'])->latest()->paginate(10);
        return view('pages.admin.products.index', compact('products'));
    }

    public function setPrimaryImage(ProductImage $image)
    {
        ProductImage::where('product_id', $image->product_id)->update(['is_primary' => false]);

        $image->update(['is_primary' => true]);

        return back()->with('success', 'Primary main display image changed successfully!');
    }

    public function update(UpdateProductRequest $request, Product $product)
    {
        $data = collect($request->validated())->except('images')->toArray();
        $data['slug'] = Str::slug($data['name']);

        $product->update($data);

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $index => $imageFile) {
                $storedPath = $imageFile->store('products', 'public');

                $isPrimary = $product->images()->count() === 0 && $index === 0;

                ProductImage::create([
                    'product_id' => $product->id,
                    'image_path' => $storedPath,
                    'is_primary' => $isPrimary,
                ]);
            }
        }

        return redirect()->route('admin.products.index')
            ->with('success', 'Product updated successfully!');
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

    public function destroyImage(ProductImage $image)
    {
        $productId = $image->product_id;
        $wasPrimary = $image->is_primary;

        if (Storage::disk('public')->exists($image->image_path)) {
            Storage::disk('public')->delete($image->image_path);
        }

        $image->delete();

        if ($wasPrimary) {
            $nextImage = ProductImage::where('product_id', $productId)->first();
            if ($nextImage) {
                $nextImage->update(['is_primary' => true]);
            }
        }

        return back()->with('success', 'Image removed successfully.');
    }

    public function edit(Product $product)
    {
        $categories = Category::orderBy('name', 'asc')->get();

        $product->load([
            'images' => function ($query) {
                $query->orderBy('is_primary', 'desc')
                    ->orderBy('id', 'asc');
            }
        ]);

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
