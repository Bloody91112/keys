<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class CommentStatus extends Model
{
    use HasFactory;

    protected $table = 'comment_statuses';
    protected $guarded = false;

    public function comment(): HasMany
    {
        return $this->hasMany(Comment::class, 'status_id', 'id');
    }

    public static function moderationId(): int
    {
        return CommentStatus::where('title', '=', 'moderation')->first()->id;
    }

    public static function publishedId(): int
    {
        return CommentStatus::where('title', '=', 'published')->first()->id;
    }

    public static function rejectedId(): int
    {
        return CommentStatus::where('title', '=', 'rejected')->first()->id;
    }
}
