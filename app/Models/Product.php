<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
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


    public function getFormattedPriceAttribute(): string
    {
        return '$'.number_format($this->price, 2);
    }


    public function getFormattedSalePriceAttribute(): ?string
    {
        return $this->sale_price ? '$'.number_format($this->sale_price, 2) : null;
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
