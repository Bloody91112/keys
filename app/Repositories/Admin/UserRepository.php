<?php

namespace App\Repositories\Admin;


use App\Models\Comment;
use App\Models\Role;
use App\Models\User;

class UserRepository
{
    private function relations(): array
    {
        $roles = Role::all();
        return compact('roles');
    }

    public function editData(User $user): array
    {
        $data = $this->relations();
        $data['model'] = $user;
        $data['comments'] = $user->comments()->orderByDesc('created_at')->take(3)->get();
        $data['favorites'] = $user->favorites()->orderByDesc('created_at')->take(10)->get();
        $data['route'] = [
            'action' => route('admin.users.update', $user->id),
            'method' => 'patch'
        ];
        $data['pageTitle'] = 'Users | ' . $user->name;
        $data['pageH1'] = 'Users - ' . $user->name;
        return $data;
    }

    public function createData(): array
    {
        $data = $this->relations();
        $data['model'] = null;
        $data['route'] = [
            'action' => route('admin.users.store'),
            'method' => 'post'
        ];
        $data['pageTitle'] = 'New user';
        $data['pageH1'] = 'New user';
        return $data;
    }

    public function indexData(): array
    {
        $data['models'] = User::paginate(10);
        $data['pageTitle'] = 'Users';
        $data['pageH1'] = 'Users';
        $data['tableAttributes'] = ['id','name', 'email', 'role_id'];
        $data['route'] = 'admin.users';
        return $data;
    }
}

