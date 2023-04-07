<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\StoreFavoriteRequest;
use App\Http\Resources\Favorite\FavoriteResource;
use App\Models\Favorite;
use Illuminate\Http\Request;

class FavoriteController extends Controller
{
    public function store(StoreFavoriteRequest $request)
    {
        $data = $request->validated();
        $data['user_id'] = auth()->user()->id;
        $favorite = Favorite::firstOrCreate(['user_id' => $data['user_id'], 'product_id' => $data['product_id']], $data);
        return new FavoriteResource($favorite);

    }

    public function destroy(Favorite $favorite)
    {
        $favorite->delete();
        return new FavoriteResource($favorite);
    }
}
