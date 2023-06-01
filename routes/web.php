<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
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
});

Auth::routes();

Route::middleware(['auth','ceklevel:Admin'])->group(function () {
    Route::controller(HomeController::class)->prefix('admin')->name('admin.')->group( function() {
        Route::get('/', 'index')->name('index');
    });

    Route::controller(RestaurantController::class)->prefix('admin/restaurant')->name('restaurant.')->group( function() {
        Route::get('/', 'index')->name('index');
        Route::put('/store', 'store')->name('store');
    });
});
