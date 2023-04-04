<?php

namespace App\Services\Admin;

use App\Http\Requests\Admin\StoreCommentRequest;
use App\Http\Requests\Admin\UpdateCommentRequest;
use App\Models\Comment;

class CommentService
{
    public function store(StoreCommentRequest $request): void
    {
        $data = $request->validated();
        Comment::create($data);
    }

    public function update(UpdateCommentRequest $request, Comment $comment): void
    {
        $data = $request->validated();
        $comment->update($data);
    }

    public function delete(Comment $comment): void
    {
        $comment->delete();
    }
}
