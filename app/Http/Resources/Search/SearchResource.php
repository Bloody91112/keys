<?php

namespace App\Http\Resources\Search;

use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ProductTag;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SearchResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'products' => Product::where('title', 'like', "%{$this->resource}%")->get(),
            'tags' => ProductTag::where('title', 'like', "%{$this->resource}%")->get(),
            'categories' => ProductCategory::where('title', 'like', "%{$this->resource}%")->get(),
        ];
    }
}
