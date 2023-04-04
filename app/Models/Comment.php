<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Comment extends Model
{
    use HasFactory;
    protected $table = "comments";
    protected $guarded = false;

    public function product():BelongsTo
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }

    public function user():BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function status(): BelongsTo
    {
        return $this->belongsTo(CommentStatus::class, 'status_id', 'id');
    }

    public static function rejectedItems(): Collection
    {
        return Comment::where('status_id', '=', CommentStatus::rejectedId())->get();
    }

    public static function publishedItems(): Collection
    {
        return Comment::where('status_id', '=', CommentStatus::publishedId())->get();
    }

    public static function moderationItems(): Collection
    {
        return Comment::where('status_id', '=', CommentStatus::moderationId())->get();
    }
}
