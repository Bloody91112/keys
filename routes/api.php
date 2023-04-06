<?php

use App\Http\Controllers\API\ProductCategoryController;
use App\Http\Controllers\API\ProductController;
use App\Http\Controllers\API\ProductTagController;
use App\Http\Controllers\API\SearchController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('search/{q}', [ SearchController::class, 'index' ])->name('search.index');

Route::resource('tags', ProductTagController::class)->only(['index', 'show']);
Route::resource('categories', ProductCategoryController::class)->only(['index', 'show']);
Route::resource('products', ProductController::class)->only(['index', 'show']);
