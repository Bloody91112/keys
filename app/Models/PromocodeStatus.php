<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class PromocodeStatus extends Model
{
    use HasFactory;
    protected $table = 'promocode_statuses';
    protected $guarded = false;

    public function promocode(): HasMany
    {
        return $this->hasMany(Promocode::class, 'status_id', 'id');
    }

    public static function reserveId(): int
    {
        return PromocodeStatus::where('title', '=', 'reserve')->first()->id;
    }

    public static function activeId(): int
    {
        return PromocodeStatus::where('title', '=', 'active')->first()->id;
    }

    public static function archivedId(): int
    {
        return PromocodeStatus::where('title', '=', 'archived')->first()->id;
    }

    public static function deletedId(): int
    {
        return PromocodeStatus::where('title', '=', 'deleted')->first()->id;
    }
}
