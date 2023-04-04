<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreProductCategoryRequest;
use App\Http\Requests\Admin\UpdateProductCategoryRequest;
use App\Models\ProductCategory;
use App\Repositories\Admin\ProductCategoryRepository;
use App\Services\Admin\ProductCategoryService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class ProductCategoryController extends Controller
{
    private ProductCategoryService $service;
    private ProductCategoryRepository $repository;

    public function __construct()
    {
        $this->service = new ProductCategoryService();
        $this->repository = new ProductCategoryRepository();
    }

    public function index(): View
    {
        return view('admin.pages.categories.index', $this->repository->indexData());
    }

    public function create(): View
    {
        return view('admin.pages.categories.item', $this->repository->createData());
    }

    public function store(StoreProductCategoryRequest $request): RedirectResponse
    {
        $this->service->store($request);
        return redirect()->route('admin.categories.index');
    }

    public function show(ProductCategory $category): RedirectResponse
    {
        return redirect()->route('admin.categories.edit', $category);
    }

    public function edit(ProductCategory $category): View
    {
        return view('admin.pages.categories.item', $this->repository->editData($category));
    }

    public function update(UpdateProductCategoryRequest $request, ProductCategory $category): RedirectResponse
    {
        $this->service->update($request,$category);
        return redirect()->route('admin.categories.index');
    }

    public function destroy(ProductCategory $category): RedirectResponse
    {
        $this->service->delete($category);
        return redirect()->route('admin.categories.index');
    }
}
