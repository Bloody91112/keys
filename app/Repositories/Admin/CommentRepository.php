<?php

namespace App\Repositories\Admin;

use App\Models\Comment;
use App\Models\CommentStatus;
use App\Models\Product;
use App\Models\User;

class CommentRepository
{
    private function relations(): array
    {
        $products = Product::all();
        $users = User::all();
        $statuses = CommentStatus::all();
        return compact('products', 'users', 'statuses');
    }

    public function editData(Comment $comment): array
    {
        $data = $this->relations();
        $data['model'] = $comment;
        $data['route'] = [
            'action' => route('admin.comments.update', $comment->id),
            'method' => 'patch'
        ];
        $data['pageTitle'] = 'Comments | ' . $comment->id;
        $data['pageH1'] = 'Comments - ' . $comment->id;
        return $data;
    }

    public function createData(): array
    {
        $data = $this->relations();
        $data['model'] = null;
        $data['route'] = [
            'action' => route('admin.comments.store'),
            'method' => 'post'
        ];
        $data['pageTitle'] = 'New comment';
        $data['pageH1'] = 'New comment';
        return $data;
    }

    public function indexData(): array
    {
        $data['models'] = Comment::paginate(10);
        $data['pageTitle'] = 'Comments';
        $data['pageH1'] = 'Comments';
        $data['tableAttributes'] = ['id', 'user_id', 'product_id' , 'message' ];
        $data['route'] = 'admin.comments';
        return $data;
    }
}

