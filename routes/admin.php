<?php

use Illuminate\Support\Facades\Route;

Route::get('/', [App\Http\Controllers\Dashboard\IndexController::class, 'index'])->name('dashboard');
#### category ####
Route::group(['prefix' => 'categories'], function () {
    Route::get('/', [App\Http\Controllers\Dashboard\CategoryController::class, 'index'])->name('dashboard.categories');
    Route::get('ajax', [App\Http\Controllers\Dashboard\CategoryController::class, 'getall'])->name('dashboard.categories.getall');
    Route::post('store', [App\Http\Controllers\Dashboard\CategoryController::class, 'store'])->name('dashboard.categories.store');
    Route::get('edit/{id}', [App\Http\Controllers\Dashboard\CategoryController::class, 'edit'])->name('dashboard.categories.edit');
    Route::post('update/{id}', [App\Http\Controllers\Dashboard\CategoryController::class, 'update'])->name('dashboard.categories.update');
    Route::delete('delete', [App\Http\Controllers\Dashboard\CategoryController::class, 'delete'])->name('dashboard.categories.delete');
});
#### /category ####

Route::group(['prefix' => 'settings'], function () {
    Route::post('/{setting}/update', [App\Http\Controllers\Dashboard\SettingController::class, 'update'])->name('dashboard.settings.update');
    Route::get('/', [App\Http\Controllers\Dashboard\SettingController::class, 'index'])->name('dashboard.settings.index');
});
Route::group(['prefix' => 'products'], function () {
    #### product ####
    Route::get('/', [App\Http\Controllers\Dashboard\ProductController::class, 'index'])->name('dashboard.products');
    Route::get('ajax', [App\Http\Controllers\Dashboard\ProductController::class, 'getall'])->name('dashboard.products.getall');
    Route::get('create', [App\Http\Controllers\Dashboard\ProductController::class, 'create'])->name('dashboard.products.create');
    Route::post('store', [App\Http\Controllers\Dashboard\ProductController::class, 'store'])->name('dashboard.products.store');
    Route::get('edit/{id}', [App\Http\Controllers\Dashboard\ProductController::class, 'edit'])->name('dashboard.products.edit');
    Route::post('update/{id}', [App\Http\Controllers\Dashboard\ProductController::class, 'update'])->name('dashboard.products.update');
    Route::delete('delete/{id}', [App\Http\Controllers\Dashboard\ProductController::class, 'delete'])->name('dashboard.products.delete');
    Route::get('deleteImages/{id}', [App\Http\Controllers\Dashboard\ProductController::class, 'deleteImage'])->name('dashboard.products.deleteImage');
    #### /product ####
});
