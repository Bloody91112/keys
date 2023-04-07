<?php

use App\Http\Controllers\Admin\CommentController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\PaymentController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ProductCategoryController;
use App\Http\Controllers\Admin\ProductTagController;
use App\Http\Controllers\Admin\PromocodeController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\IndexController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'admin'], function () {
    Auth::routes();

    Route::group([ 'middleware' => 'isAdmin', 'as' => 'admin.' ],function(){
        Route::get('/', [HomeController::class, 'index'])->name('home');
        Route::resource('products', ProductController::class);
        Route::resource('tags', ProductTagController::class);
        Route::resource('categories', ProductCategoryController::class);
        Route::resource('promocodes', PromocodeController::class);
        Route::resource('users', UserController::class);
        Route::resource('comments', CommentController::class);
        Route::resource('payments', PaymentController::class);
    });
});


//Route::get('{page}', [IndexController::class, 'index'])->where('page','^(?!auth|admin).*$');
Route::get('{page}', [IndexController::class, 'index'])->where('page','^(?!admin).*$');

