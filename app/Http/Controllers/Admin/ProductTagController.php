<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreProductTagRequest;
use App\Http\Requests\Admin\UpdateProductTagRequest;
use App\Models\ProductTag;
use App\Repositories\Admin\ProductTagRepository;
use App\Services\Admin\ProductTagService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class ProductTagController extends Controller
{
    private ProductTagService $service;
    private ProductTagRepository $repository;

    public function __construct()
    {
        $this->service = new ProductTagService();
        $this->repository = new ProductTagRepository();
    }

    public function index(): View
    {
        return view('admin.pages.tags.index', $this->repository->indexData());
    }

    public function create(): View
    {
        return view('admin.pages.tags.item', $this->repository->createData());
    }

    public function store(StoreProductTagRequest $request): RedirectResponse
    {
        $this->service->store($request);
        return redirect()->route('admin.tags.index');
    }

    public function show(ProductTag $tag): RedirectResponse
    {
        return redirect()->route('admin.tags.edit', $tag);
    }

    public function edit(ProductTag $tag): View
    {
        return view('admin.pages.tags.item', $this->repository->editData($tag));
    }

    public function update(UpdateProductTagRequest $request, ProductTag $tag): RedirectResponse
    {
        $this->service->update($request,$tag);
        return redirect()->route('admin.tags.index');
    }

    public function destroy(ProductTag $tag): RedirectResponse
    {
        $this->service->delete($tag);
        return redirect()->route('admin.tags.index');
    }
}
