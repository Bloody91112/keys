<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Promocode extends Model
{
    protected $guarded = false;
    protected $table = 'promocodes';
    use HasFactory;

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }

    public function status(): BelongsTo
    {
        return $this->belongsTo(PromocodeStatus::class, 'status_id', 'id');
    }

    public function getTitleAttribute(): string
    {
        return 'PROMOCODE ID - ' . $this->id;
    }

    public static function reserveItems(): Collection
    {
        return Promocode::where('status_id', '=', PromocodeStatus::reserveId())->get();
    }

    public static function activeItems(): Collection
    {
        return Promocode::where('status_id', '=', PromocodeStatus::activeId())->get();
    }

    public static function archivedItems(): Collection
    {
        return Promocode::where('status_id', '=', PromocodeStatus::archivedId())->get();
    }

    public static function deletedItems(): Collection
    {
        return Promocode::where('status_id', '=', PromocodeStatus::deletedId())->get();
    }
}
