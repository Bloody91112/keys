<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Http\Requests\Admin\StoreCommentRequest;
use App\Http\Requests\Admin\UpdateCommentRequest;
use App\Models\Comment;
use App\Repositories\Admin\CommentRepository;
use App\Services\Admin\CommentService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class CommentController extends Controller
{

    private CommentService $service;
    private CommentRepository $repository;

    public function __construct()
    {
        $this->service = new CommentService();
        $this->repository = new CommentRepository();
    }

    public function index(): View
    {
        return view('admin.pages.comments.index', $this->repository->indexData());
    }

    public function create(): View
    {
        return view('admin.pages.comments.item', $this->repository->createData());
    }

    public function store(StoreCommentRequest $request): RedirectResponse
    {
        $this->service->store($request);
        return redirect()->route('admin.comments.index');
    }

    public function show(Comment $comment): RedirectResponse
    {
        return redirect()->route('admin.comments.edit', $comment);
    }

    public function edit(Comment $comment): View
    {
        return view('admin.pages.comments.item', $this->repository->editData($comment));
    }

    public function update(UpdateCommentRequest $request, Comment $comment): RedirectResponse
    {
        $this->service->update($request,$comment);
        return redirect()->route('admin.comments.index');
    }

    public function destroy(Comment $comment): RedirectResponse
    {
        $this->service->delete($comment);
        return redirect()->route('admin.comments.index');
    }
}
