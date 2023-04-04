<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class PaymentStatus extends Model
{
    use HasFactory;

    protected $table = 'payment_statuses';
    protected $guarded = false;

    public function promocode(): HasMany
    {
        return $this->hasMany(Promocode::class, 'status_id', 'id');
    }

    public static function successId(): int
    {
        return PaymentStatus::where('title', '=', 'success')->first()->id;
    }

    public static function failedId(): int
    {
        return PaymentStatus::where('title', '=', 'failed')->first()->id;
    }
}
