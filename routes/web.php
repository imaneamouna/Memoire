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



// Route::get('/', function () {
//     return view('dashboard.settings.index');
// })->name('index');
// Route::get('/order/{id}', [App\Http\Controllers\Site\OrderController::class, 'index'])->name('order');

Auth::routes();
Route::group(['middleware' => 'auth'], function () {
    //  Route::get('home', [App\Http\Controllers\Site\HomeController::class, 'index'])->name('site.home');
    Route::get('/products', [App\Http\Controllers\Site\HomeController::class, 'index'])->name('our_products');
    Route::get('/', [App\Http\Controllers\Site\HomeController::class, 'home'])->name('home');
    // Route::get('/order/{id}', [App\Http\Controllers\Site\HomeController::class, 'show'])->name('show.details');
    Route::get('/order/{id}', [App\Http\Controllers\Site\HomeController::class, 'show'])->name('order');
    Route::get('/contactus', [App\Http\Controllers\Site\HomeController::class, 'contact'])->name('contactus');

    /************categories********************************* */
});
