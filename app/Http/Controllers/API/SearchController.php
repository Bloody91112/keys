<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\Search\SearchResource;
use Illuminate\Http\Resources\Json\JsonResource;


class SearchController extends Controller
{
    public function index(string $searchValue): JsonResource
    {
        return new SearchResource($searchValue);
    }

}
