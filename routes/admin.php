<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
route::get('/',function(){
  return view('dashboard.categories.index');
})->name('indexx');
Route::get('/index', [App\Http\Controllers\Dashboard\IndexController::class,'index'])->name('index');

Route::group(['as' => 'dashboard.'], function () {
    Route::put('settings/{setting}/update',[App\Http\Controllers\Dashboard\SettingController::class , 'update'])->name('settings.update');
    Route::get('settings',[App\Http\Controllers\Dashboard\SettingController::class , 'index'])->name('settings.index');
    Route::get('categories/ajax',[App\Http\Controllers\Dashboard\CategoryController::class , 'getall'])->name('categories.getall');
    Route::delete('categories/delete',[App\Http\Controllers\Dashboard\CategoryController::class , 'delete'])->name('categories.delete');
    Route::resource('categories', App\Http\Controllers\Dashboard\CategoryController::class)->except('destroy','create' , 'show');
});
