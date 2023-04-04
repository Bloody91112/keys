<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreUserRequest;
use App\Http\Requests\Admin\UpdateUserRequest;
use App\Models\User;
use App\Repositories\Admin\UserRepository;
use App\Services\Admin\UserService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class UserController extends Controller
{
    private UserService $service;
    private UserRepository $repository;

    public function __construct()
    {
        $this->service = new UserService();
        $this->repository = new UserRepository();
    }

    public function index(): View
    {
        return view('admin.pages.users.index', $this->repository->indexData());
    }

    public function create(): View
    {
        return view('admin.pages.users.item', $this->repository->createData());
    }

    public function store(StoreUserRequest $request): RedirectResponse
    {
        $this->service->store($request);
        return redirect()->route('admin.users.index');
    }

    public function show(User $user): RedirectResponse
    {
        return redirect()->route('admin.users.edit', $user);
    }

    public function edit(User $user): View
    {
        return view('admin.pages.users.item', $this->repository->editData($user));
    }

    public function update(UpdateUserRequest $request, User $user): RedirectResponse
    {
        $this->service->update($request,$user);
        return redirect()->route('admin.users.index');
    }

    public function destroy(User $user): RedirectResponse
    {
        $this->service->delete($user);
        return redirect()->route('admin.users.index');
    }
}
