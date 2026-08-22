<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;


class Category extends Model
{

    protected $fillable = ['name', 'slug', 'parent_id'];


    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }

    public function parent(): BelongsTo
    {
        return $this->belongsTo(self::class, 'parent_id');
    }

    public function descendants(): HasMany
    {
        return $this->children()
            ->withCount('products')
            ->with('descendants');
    }

    public function children(): HasMany
    {
        return $this->hasMany(self::class, 'parent_id');
    }


    public function totalProductsCount(): Attribute
    {
        return Attribute::get(function (): int {
            $total = $this->products_count ?? 0;

            foreach ($this->descendants as $descendant) {
                $total += $descendant->products_count ?? 0;
            }

            return $total;
        });
    }

    public function getRouteKeyName(): string
    {
        return 'slug';
    }
}


