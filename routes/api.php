<?php

use App\Http\Controllers\API\ProductCategoryController;
use App\Http\Controllers\API\ProductTagController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::resource('tags', ProductTagController::class)->only(['index', 'show']);
Route::resource('categories', ProductCategoryController::class)->only(['index', 'show']);
