<?php

namespace App\Services\Admin;

use App\Http\Requests\Admin\StoreProductTagRequest;
use App\Http\Requests\Admin\UpdateProductTagRequest;
use App\Models\ProductTag;


class ProductTagService
{
    public function store(StoreProductTagRequest $request): void
    {
        $data = $request->validated();
        ProductTag::create($data);
    }

    public function update(UpdateProductTagRequest $request, ProductTag $tag): void
    {
        $data = $request->validated();
        $tag->update($data);
    }

    public function delete(ProductTag $tag): void
    {
        $tag->products()->detach();
        $tag->delete();
    }
}
