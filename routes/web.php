<?php

use App\Http\Controllers\Category;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductController;
use App\Models\Product;
use Inertia\Inertia;
use Illuminate\Support\Facades\Route;


Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

Route::controller(ProductController::class)->prefix('product')->group(function(){
    Route::get('/', "index")->name('product.index');
    Route::get('/create', "create");
    Route::post('/store', "store");
    Route::get('/{product}', "show");
    Route::get('/edit/{product}', "edit");
    Route::put('/{productoId}', "update");
    Route::delete('/{product}', "destroy");
});

Route::controller(CategoryController::class)->prefix('category')->group(function(){
    Route::get('/', "index")->name('category.index');
    Route::get('/create', "create");
    Route::post('/store', "store");
    Route::get('/{category}', "show");
    Route::get('/edit/{category}', "edit");
    Route::put('/{category}', "update");
    Route::delete('/{category}', "destroy");
});