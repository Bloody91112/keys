<?php

namespace App\Services\Admin;

use App\Http\Requests\Admin\StoreProductRequest;
use App\Http\Requests\Admin\UpdateProductRequest;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;

class ProductService
{
    public function store(StoreProductRequest $request): void
    {
        $data = $request->validated();
        if (isset($data['tags'])) {
            $tagsIds = $data['tags'];
            unset($data['tags']);
        }
        $data['preview'] = Storage::disk('public')->put('/images/products', $data['preview']);


        if (isset($data['images'])) {
            if (!empty($data['images'])){
                $requestImages = $data['images'];
                $paths = [];
                foreach ($requestImages as $requestImage){
                    $paths[] = Storage::disk('public')->put('/images/products', $requestImage);

                }
                $data['images'] = json_encode($paths);
            }
        }

        $product = Product::create($data);

        if (isset($tagsIds)) {
            $product->tags()->attach($tagsIds);
        }

    }

    public function update(UpdateProductRequest $request, Product $product): void
    {
        $data = $request->validated();
        if (isset($data['tags'])) {
            $tagsIds = $data['tags'];
            unset($data['tags']);
        }

        if (isset($data['preview'])) {
            if (isset($product->preview)) {
                Storage::disk('public')->delete($product->preview);
            }
            $data['preview'] = Storage::disk('public')->put('/images/products', $data['preview']);
        }

        if (isset($data['images'])) {
            if (!empty($product->images)) {
                foreach ($product->images as $StorageImage){
                    Storage::disk('public')->delete($StorageImage);
                }
            }
            if (!empty($data['images'])){
                $requestImages = $data['images'];
                $paths = [];
                foreach ($requestImages as $requestImage){
                    $paths[] = Storage::disk('public')->put('/images/products', $requestImage);
                }
                $data['images'] = json_encode($paths);
            }
        }

        $product->update($data);

        if (isset($tagsIds)) {
            $product->tags()->sync($tagsIds);
        }

    }

    public function delete(Product $product): void
    {
        $product->tags()->detach();
        $product->delete();
    }
}
