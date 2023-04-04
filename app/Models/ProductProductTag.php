<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductProductTag extends Model
{
    protected $table = 'product_product_tags';
    protected $guarded = false;
    use HasFactory;
}
