<?php

namespace App\Services\Admin;

use App\Http\Requests\Admin\StoreProductCategoryRequest;
use App\Http\Requests\Admin\UpdateProductCategoryRequest;
use App\Models\ProductCategory;


class ProductCategoryService
{
    public function store(StoreProductCategoryRequest $request): void
    {
        $data = $request->validated();
        ProductCategory::create($data);
    }

    public function update(UpdateProductCategoryRequest $request, ProductCategory $category): void
    {
        $data = $request->validated();
        $category->update($data);
    }

    public function delete(ProductCategory $category): void
    {
        $category->delete();
    }
}
