<?php

namespace App\Filters;

use App\Models\Category;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class ProductFilter
{
    /**
     * Create a new class instance.
     */
    public function __construct(protected Request $request)
    {
    }

    public function apply(Builder $query): Builder
    {
        $query->when($this->request->filled('search'), function ($query, $search) {
            return $query->whereLike('name', '%'.$search.'%');
        });

        $query->when($this->request->filled('category'), function ($query) {
            $categorySlug = $this->request->input('category');

            $category = Category::where('slug', $categorySlug)->first();

            if (!$category) {
                return $query;
            }

            $categoryIds = Category::where('id', $category->id)
                ->orWhere('parent_id', $category->id)
                ->pluck('id');

            return $query->whereIn('category_id', $categoryIds);
        });


        $query->when($this->request->filled('min_price'), function ($query) {
            return $query->where('price', '>=', (float) $this->request->input('min_price') * 100);
        });

        $query->when($this->request->filled('max_price'), function ($query) {
            return $query->where('price', '<=', (float) $this->request->input('max_price') * 100);
        });

        $sortOption = $this->request->input('sort', 'latest');

        match ($sortOption) {
            'price_asc' => $query->orderBy('price', 'asc'),
            'price_desc' => $query->orderBy('price', 'desc'),
            'name_asc' => $query->orderBy('name', 'asc'),
            'name_desc' => $query->orderBy('name', 'desc'),
            'popularity' => $query->orderByDesc('total_sales'),
            'latest' => $query->orderByDesc('created_at'),
            default => $query->orderByDesc('created_at'),
        };

        $query->when($this->request->has('is_new_arrival'), function ($query) {
            return $query->where('is_new_arrival', true);
        });

        $query->when($this->request->has('on_sale'), function ($query) {
            return $query->whereNotNull('sale_price');
        });


        $query->when($this->request->has('in_stock'), function ($query) {
            return $query->where('stock', ">", 0);
        });


        return $query;
    }
}
