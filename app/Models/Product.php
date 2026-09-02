<?php

namespace App\Models;

use App\Filters\ProductFilter;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Facades\Storage;

class Product extends Model
{
    protected $fillable = [
        'category_id',
        'name',
        'slug',
        'description',
        'price',
        'sale_price',
        'stock',
        'is_new_arrival',
    ];

    protected $casts = [
        'stock' => 'integer',
        'is_new_arrival' => 'boolean',
    ];

    protected static function booted(): void
    {
        static::deleting(function (Product $product) {
            foreach ($product->images as $image) {
                if (Storage::disk('public')->exists($image->image_path)) {
                    Storage::disk('public')->delete($image->image_path);
                }
            }
        });
    }

    public function isLikedByAuthUser(): bool
    {
        if (!auth()->check()) {
            return false;
        }

        return $this->likedByUsers()->where('user_id', auth()->id())->exists();
    }

    public function likedByUsers(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'product_user')->withTimestamps();
    }

    public function images(): HasMany
    {
        return $this->hasMany(ProductImage::class);
    }

    public function primaryImage(): HasOne
    {
        return $this->hasOne(ProductImage::class)->where('is_primary', true);
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function scopeFilter(Builder $query, ProductFilter $filter): Builder
    {
        return $filter->apply($query);
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    protected function price(): Attribute
    {
        return Attribute::make(
            get: fn(int $value) => $value / 100,
            set: fn(float|int $value) => (int) round($value * 100),
        );
    }

    protected function salePrice(): Attribute
    {
        return Attribute::make(
            get: fn(?int $value) => $value ? $value / 100 : null,
            set: fn(float|int|null $value) => $value ? (int) round($value * 100) : null,
        );
    }
}
