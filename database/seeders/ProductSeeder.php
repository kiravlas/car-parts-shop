<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Database\Seeder;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use RuntimeException;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $categories = Category::query()
            ->whereNotNull('parent_id')
            ->get();

        if ($categories->isEmpty()) {
            throw new RuntimeException(
                'No child categories found. Run CategorySeeder first.'
            );
        }

        $imageDirectory = database_path('seeders/assets/products');

        if (! File::isDirectory($imageDirectory)) {
            throw new RuntimeException(
                "Product image directory does not exist: {$imageDirectory}"
            );
        }

        $sourceImages = collect(File::files($imageDirectory))
            ->filter(function ($file) {
                return in_array(
                    strtolower($file->getExtension()),
                    ['jpg', 'jpeg', 'png', 'webp']
                );
            })
            ->values();

        if ($sourceImages->count() < 5) {
            throw new RuntimeException(
                'You need at least 5 product images in database/seeders/assets/products.'
            );
        }

        Storage::disk('public')->deleteDirectory('demo/products');

        $this->createOnSaleProducts(
            $categories,
            $sourceImages
        );

        $this->createTopSellerProducts(
            $categories,
            $sourceImages
        );

        $this->createNewArrivalProducts(
            $categories,
            $sourceImages
        );
    }

    private function createOnSaleProducts(
        Collection $categories,
        Collection $sourceImages
    ): void {
        $products = Product::factory()
            ->count(50)
            ->state(fn () => [
                'category_id' => $categories->random()->id,
            ])
            ->onSale()
            ->create();

        $this->attachImages($products, $sourceImages);
    }

    private function attachImages(
        Collection $products,
        Collection $sourceImages
    ): void {
        foreach ($products as $product) {
            $selectedImages = $sourceImages->random(4);

            foreach ($selectedImages as $index => $sourceImage) {
                $filename = Str::uuid()
                    .'.'
                    .$sourceImage->getExtension();

                $path = "demo/products/{$filename}";

                Storage::disk('public')->put(
                    $path,
                    File::get($sourceImage->getPathname())
                );

                ProductImage::create([
                    'product_id' => $product->id,
                    'image_path' => $path,
                    'is_primary' => $index === 0,
                ]);
            }
        }
    }

    private function createTopSellerProducts(
        Collection $categories,
        Collection $sourceImages
    ): void {
        $products = Product::factory()
            ->count(50)
            ->state(fn () => [
                'category_id' => $categories->random()->id,
            ])
            ->topSeller()
            ->create();

        $this->attachImages($products, $sourceImages);
    }

    private function createNewArrivalProducts(
        Collection $categories,
        Collection $sourceImages
    ): void {
        $products = Product::factory()
            ->count(50)
            ->state(fn () => [
                'category_id' => $categories->random()->id,
            ])
            ->newArrival()
            ->create();

        $this->attachImages($products, $sourceImages);
    }
}
