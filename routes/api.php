<?php

use App\Http\Controllers\API\FavoriteController;
use App\Http\Controllers\API\ProductCategoryController;
use App\Http\Controllers\API\ProductController;
use App\Http\Controllers\API\ProductTagController;
use App\Http\Controllers\API\SearchController;
use App\Http\Controllers\API\UserController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Route;


Route::post('/login', [LoginController::class, 'login'])->name('api.login');
Route::post('/logout', [LoginController::class, 'logout'])->name('api.logout');
Route::post('/register', [RegisterController::class, 'register'])->name('api.register');

Route::get('search/{q}', [ SearchController::class, 'index' ])->name('search.index');

Route::resource('tags', ProductTagController::class)->only(['index', 'show']);
Route::resource('categories', ProductCategoryController::class)->only(['index', 'show']);
Route::resource('products', ProductController::class)->only(['index', 'show']);
Route::resource('user', UserController::class)->only(['index']);

Route::group(['middleware' => 'auth:sanctum'], function(){
    Route::resource('favorites', FavoriteController::class)->only(['store', 'destroy']);
});

