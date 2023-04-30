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
route::get('/admin',function(){
  dd('admin route');
})->name('adminn');
Route::get('/index', [App\Http\Controllers\Dashboard\IndexController::class,'index'])->name('index');
Route::put('settings/{setting}/update',[App\Http\Controllers\Dashboard\SettingController::class , 'update'])->name('dashboard.settings.update');
// Route::put('/settings/{setting}/update', [App\Http\Controllers\Dashboard\SettingController::class , 'update'])->name('dashboard.settings.update');
// Route::get('settings',[SettingController::class , 'index'])->name('dashboard.settings.index');

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
