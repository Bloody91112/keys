<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductTag\ProductTagResource;
use App\Models\ProductTag;
use Illuminate\Http\Resources\Json\JsonResource;


class ProductTagController extends Controller
{

    public function index(): JsonResource
    {
        return ProductTagResource::collection(ProductTag::all());
    }

    public function show(ProductTag $tag): JsonResource
    {
        return new ProductTagResource($tag);
    }

}
