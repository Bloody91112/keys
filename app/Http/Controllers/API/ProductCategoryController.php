<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductCategory\ProductCategoryResource;
use App\Models\ProductCategory;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductCategoryController extends Controller
{

    public function index(): JsonResource
    {
        return ProductCategoryResource::collection(ProductCategory::all());
    }

    public function show(ProductCategory $category): JsonResource
    {
        return new ProductCategoryResource($category);
    }

}
