<?php

namespace App\Supervisors;

use App\Models\Category;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;
use LaravelIdea\Helper\App\Models\_IH_Category_C;

class CategorySupervisor
{
    private const int ONE_HOUR_IN_SECONDS = 3600;

    public function readAll(): Collection
    {
        $rawCategoriesArray = Cache::remember('categories_raw_array', self::ONE_HOUR_IN_SECONDS, static function () {

            return Category::whereNull('parent_id')
                ->with(['children' => static fn($query) => $query->orderBy('name')])
                ->orderBy('name')
                ->get()
                ->toArray();
        });

        return collect($rawCategoriesArray)->map(static function (array $parentAttributes) {
            $rawChildren = $parentAttributes['children'] ?? [];
            unset($parentAttributes['children']);
            $parentModel = (new Category)->forceFill($parentAttributes);
            $childrenCollection = collect($rawChildren)->map(static fn(array $childAttributes) => (new Category)->forceFill($childAttributes));
            $parentModel->setRelation('children', $childrenCollection);

            return $parentModel;
        });
    }

    public function clearCache(): void
    {
        Cache::forget('categories_raw_array');
    }

    public function adminCategoriesList($pages): _IH_Category_C|array|LengthAwarePaginator
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

    public function updateCategory($category, array $data): bool
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
