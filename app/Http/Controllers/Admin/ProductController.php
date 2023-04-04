<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreProductRequest;
use App\Http\Requests\Admin\UpdateProductRequest;
use App\Models\Product;
use App\Repositories\Admin\ProductRepository;
use App\Services\Admin\ProductService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class ProductController extends Controller
{
    private ProductService $service;
    private ProductRepository $repository;

    public function __construct()
    {
        $this->service = new ProductService();
        $this->repository = new ProductRepository();
    }

    public function index():View
    {
        return view('admin.pages.products.index', $this->repository->indexData());
    }

    public function show(Product $product): RedirectResponse
    {
        return redirect()->route('admin.products.edit', $product);
    }

    public function create():View
    {
        return view('admin.pages.products.item', $this->repository->createData());
    }

    public function store(StoreProductRequest $request): RedirectResponse
    {
        $this->service->store($request);
        return redirect()->route('admin.products.index');
    }

    public function edit(Product $product):View
    {
        return view('admin.pages.products.item', $this->repository->editData($product));
    }

    public function update(UpdateProductRequest $request, Product $product): RedirectResponse
    {
        $this->service->update($request, $product);
        return redirect()->route('admin.products.index');
    }

    public function destroy(Product $product): RedirectResponse
    {
        $this->service->delete($product);
        return redirect()->route('admin.products.index');
    }
}
