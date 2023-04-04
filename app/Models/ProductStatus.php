<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ProductStatus extends Model
{
    protected $table = 'product_statuses';
    protected $guarded = false;
    use HasFactory;

    public function product(): HasMany
    {
        return $this->hasMany(Product::class, 'status_id', 'id');
    }

    public static function activeId(): int
    {
        return ProductStatus::where('title', '=', 'active')->first()->id;
    }

    public static function inactiveId(): int
    {
        return ProductStatus::where('title', '=', 'inactive')->first()->id;
    }
}
