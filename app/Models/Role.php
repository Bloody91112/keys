<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Role extends Model
{
    use HasFactory;
    protected $guarded = false;
    protected $table = 'roles';

    public function users(): HasMany
    {
        return $this->HasMany(User::class, 'role_id', 'id');
    }

}
