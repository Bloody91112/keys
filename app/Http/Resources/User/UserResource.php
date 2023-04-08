<?php

namespace App\Http\Resources\User;

use App\Http\Resources\Favorite\FavoriteResource;
use App\Http\Resources\Product\ProductResource;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'role' => $this->role->toArray(),
            'favorites' => FavoriteResource::collection($this->favorites),
            'favoritesItems' => ProductResource::collection(Product::whereIn('id', $this->favorites->pluck('product_id'))->get()),
            'avatar' => $this->avatar,
        ];
    }
}
