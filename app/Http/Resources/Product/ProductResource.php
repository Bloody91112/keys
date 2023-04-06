<?php

namespace App\Http\Resources\Product;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'description' => $this->description,
            'requirements' => $this->requirements,
            'discount' => $this->discount,
            'discountWithPercentage' => $this->discountWithPercentage,
            'images' => $this->images,
            'preview' => $this->preview,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'category' => $this->category->toArray(),
            'version' => $this->version->toArray(),
            'tags' => $this->tags->toArray(),
            'promocodes' => $this->promocodes->toArray(),
            'promocodesCount' => $this->promocodes->count(),
            'price' => $this->price,
            'priceWithCurrency' => $this->priceWithCurrency
        ];
    }
}
