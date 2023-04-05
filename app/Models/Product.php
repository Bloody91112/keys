<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    protected $table = 'products';
    protected $guarded = false;
    use HasFactory;

    public function category(): BelongsTo
    {
        return $this->belongsTo(ProductCategory::class, 'category_id', 'id');
    }

    public function status(): BelongsTo
    {
        return $this->belongsTo(ProductStatus::class, 'status_id', 'id');
    }

    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(ProductTag::class, 'product_product_tags', 'product_id', 'tag_id');
    }

    public function version(): BelongsTo
    {
        return $this->belongsTo(Version::class, 'version_id', 'id');
    }

    public function promocodes(): HasMany
    {
        return $this->hasMany(Promocode::class, 'product_id', 'id');
    }

    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class, 'product_id', 'id');
    }

    public function favorites(): HasMany
    {
        return $this->hasMany(Favorite::class, 'product_id', 'id');
    }

    public function getImagesAttribute($value)
    {
        return json_decode($value);
    }

    public static function activeItems(): Collection
    {
        return Product::where('status_id', '=', ProductStatus::activeId())->get();
    }

    public static function inactiveItems(): Collection
    {
        return Product::where('status_id', '=', ProductStatus::inactiveId())->get();
    }

    public function getPreviewAttribute($value): string
    {
        return isset($value) ? url('storage/' . $value): '';
    }

    public function getPriceAttribute(): string
    {
        $promocodes = $this->promocodes;
        return $promocodes->count() > 0 ? $promocodes->sortBy('price')->first()->price : '';
    }

    public function getPriceWithCurrencyAttribute($value): string
    {
        $value = $this->getPriceAttribute();
        return $value !== '' ? $value . '$' : '';
    }

    public function getDiscountWithPercentageAttribute($value): string
    {
        return isset($this->discount) ? $this->discount . '%' : '';
    }
}
