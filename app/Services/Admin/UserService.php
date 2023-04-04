<?php

namespace App\Services\Admin;

use App\Http\Requests\Admin\StoreUserRequest;
use App\Http\Requests\Admin\UpdateUserRequest;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

class UserService
{
    public function store(StoreUserRequest $request): void
    {
        $data = $request->validated();
        if (isset($data['avatar'])){
            $data['avatar'] = Storage::disk('public')->put('/images/users', $data['avatar']);
        }
        $data['password'] = \Hash::make($data['password']);
        User::create($data);
    }

    public function update(UpdateUserRequest $request, User $user): void
    {
        $data = $request->validated();
        if (isset($data['avatar'])) {
            if (isset($user->avatar)) {
                Storage::disk('public')->delete($user->avatar);
            }
            $data['avatar'] = Storage::disk('public')->put('/images/users', $data['avatar']);
        }

        $user->update($data);
    }

    public function delete(User $user): void
    {
        $user->delete();
    }
}
