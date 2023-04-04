<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Version extends Model
{
    use HasFactory;
    protected $guarded = false;
    protected $table = 'versions';

    public function product(): HasMany
    {
        return $this->hasMany(Product::class, 'version_id', 'id');
    }
}
