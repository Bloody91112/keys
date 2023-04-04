<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Payment extends Model
{
    use HasFactory;

    protected $guarded = false;

    public function status(): BelongsTo
    {
        return $this->belongsTo(PaymentStatus::class, 'status_id', 'id');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function promocode(): BelongsTo
    {
        return $this->belongsTo(Promocode::class, 'promocode_id', 'id');
    }

    public static function successItems(): Collection
    {
        return Payment::where('status_id', '=', PaymentStatus::successId())->get();
    }

    public static function failedItems(): Collection
    {
        return Payment::where('status_id', '=', PaymentStatus::failedId())->get();
    }
}
