<?php

namespace App\Supervisors;

use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;
use LaravelIdea\Helper\App\Models\_IH_Product_C;

class ProductSupervisor
{
    private const int ONE_HOUR_IN_SECONDS = 3600;

    public function getTopSales(int $amount)
    {
        return Cache::remember('products_top_sales_'.$amount, self::ONE_HOUR_IN_SECONDS, static function () use ($amount) {
            return Product::query()
                ->where('total_sales', '>=', 100)
                ->orderByDesc('created_at')
                ->with('primaryImage')
                ->take($amount)
                ->get();
        });
    }

    public function getOnSale(int $amount)
    {
        return Cache::remember('products_on_sale_'.$amount, self::ONE_HOUR_IN_SECONDS, static function () use ($amount) {
            return Product::query()
                ->whereNotNull('sale_price')
                ->orderByDesc('created_at')
                ->with('primaryImage')
                ->take($amount)
                ->get();
        });
    }

    public function getNewArrivals(int $amount)
    {
        return Cache::remember('products_new_arrivals_'.$amount, self::ONE_HOUR_IN_SECONDS, static function () use ($amount) {
            return Product::query()
                ->where('is_new_arrival', true)
                ->orderByDesc('created_at')
                ->with(['primaryImage', 'category'])
                ->take($amount)
                ->get();
        });
    }

    public function adminProductsList(int $perPage = 10): _IH_Product_C|LengthAwarePaginator|array
    {
        return Product::with(['category', 'primaryImage'])
            ->latest()
            ->paginate($perPage);
    }

    public function clearHomeCache(): void
    {
        Cache::forget('products_top_sales_10');
        Cache::forget('products_on_sale_10');
        Cache::forget('products_new_arrivals_10');
    }

    public function storeProduct(array $validatedData, array $images): Product
    {
        $productData = collect($validatedData)->except('images')->toArray();
        $productData['slug'] = str($productData['name'])->slug();
        $product = Product::create($productData);

        foreach ($images as $index => $imageFile) {
            $storedPath = $imageFile->store('products', 'public');

            ProductImage::create([
                'product_id' => $product->id,
                'image_path' => $storedPath,
                'is_primary' => $index === 0,
            ]);
        }

        return $product;
    }

    public function updateProduct(Product $product, array $validatedData, array $images): bool
    {
        $productData = collect($validatedData)->except('images')->toArray();
        $productData['slug'] = str($productData['name'])->slug();

        $updated = $product->update($productData);

        if (! empty($images)) {
            foreach ($images as $index => $imageFile) {
                $storedPath = $imageFile->store('products', 'public');

                $isPrimary = $product->images()->count() === 0 && $index === 0;

                ProductImage::create([
                    'product_id' => $product->id,
                    'image_path' => $storedPath,
                    'is_primary' => $isPrimary,
                ]);
            }
        }

        return $updated;
    }

    public function destroyProduct(Product $product): bool
    {
        return $product->delete();
    }

    public function setPrimaryImage(ProductImage $image): void
    {
        ProductImage::where('product_id', $image->product_id)
            ->update(['is_primary' => false]);

        $image->update(['is_primary' => true]);
    }

    public function removeImage(ProductImage $image): void
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
    }

    public function loadProductWithSortedImages(Product $product): Product
    {
        return $product->load([
            'images' => static function ($query) {
                $query->orderBy('is_primary', 'desc')
                    ->orderBy('id', 'asc');
            },
        ]);
    }
}
