<?php

namespace App\Supervisors;

use App\Models\Category;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;

class CategorySupervisor
{
    private const int ONE_HOUR_IN_SECONDS = 3600;

    public function readAll(): Collection
    {
        return Cache::remember('categories_tree', self::ONE_HOUR_IN_SECONDS, static function () {
            return Category::whereNull('parent_id')
                ->with(['children' => static fn ($query) => $query->orderBy('name')])
                ->orderBy('name')
                ->get();
        });
    }

    public function clearCategoriesCache(): void
    {
        Cache::forget('categories_tree');
    }

    public function adminCategoriesList(int $pages): LengthAwarePaginator
    {
        return Category::query()
            ->whereNull('parent_id')
            ->with('descendants')
            ->withCount('products')
            ->orderBy('name')
            ->paginate($pages);
    }

    public function storeCategory(array $data): void
    {
        Category::create([
            'name' => $data['name'],
            'slug' => str($data['name'])->slug(),
            'parent_id' => $data['parent_id'] ?? null,
        ]);
    }

    public function updateCategory(Category $category, array $data): bool
    {
        return $category->update([
            'name' => $data['name'],
            'slug' => str($data['name'])->slug(),
        ]);
    }

    public function deleteCategory(Category $category): bool
    {
        return $category->delete();
    }
}
