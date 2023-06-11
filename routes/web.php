<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RestaurantController;
use App\Http\Controllers\LandingPageController;

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

Route::controller(LandingPageController::class)->name('landing.')->group( function() {
    Route::get('/', 'index')->name('index');
    Route::get('/product/{restaurant_id}', 'product')->name('product');
    Route::get('/pesanan-saya', 'myOrder')->name('my-order');
});

Route::controller(OrderController::class)->name('order.')->group( function() {
    Route::post('/store', 'store')->name('store');
});

Auth::routes();

Route::middleware(['auth','ceklevel:Admin'])->group(function () {
    Route::controller(HomeController::class)->prefix('admin')->name('admin.')->group( function() {
        Route::get('/', 'index')->name('index');
    });

    Route::controller(RestaurantController::class)->prefix('admin/restaurant')->name('restaurant.')->group( function() {
        Route::get('/', 'index')->name('index');
        Route::put('/store', 'store')->name('store');
        Route::put('/delete/{id}', 'delete')->name('delete');
        Route::put('/update/{id}', 'update')->name('update');
    });

    Route::controller(ProductController::class)->prefix('admin/product')->name('product.')->group( function() {
        Route::get('/', 'index')->name('index');
        Route::put('/store', 'store')->name('store');
        Route::put('/delete/{id}', 'delete')->name('delete');
        Route::put('/update/{id}', 'update')->name('update');
    });
});
