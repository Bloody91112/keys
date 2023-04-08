<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\SearchProductsRequest;
use App\Http\Resources\Product\ProductResource;
use App\Http\Resources\Search\SearchResource;
use App\Models\Product;
use Illuminate\Http\Resources\Json\JsonResource;


class SearchController extends Controller
{
    public function index(string $searchValue): JsonResource
    {
        return new SearchResource($searchValue);
    }

    public function product(SearchProductsRequest $request): JsonResource
    {
        $data = $request->validated();
        return ProductResource::collection(Product::find($data['productsIds']));
    }

}
