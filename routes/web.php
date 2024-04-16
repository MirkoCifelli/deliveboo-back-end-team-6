<?php

use Illuminate\Support\Facades\Route;

// Controllers
use App\Http\Controllers\MainController;
use App\Http\Controllers\Admin\MainController as AdminMainController;
use App\Http\Controllers\Admin\RestaurantController as AdminRestaurantController; 
use App\Http\Controllers\Admin\TypologyController as AdminTypologyController;
use App\Http\Controllers\Admin\OrderController as AdminOrderController; 
use App\Http\Controllers\Admin\DishController as AdminDishController;
use App\Http\Controllers\Admin\StatisticController as AdminStatisticController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [MainController::class, 'index'])->name('home');

Route::prefix('admin')
    ->name('admin.')
    ->middleware('auth')
    ->group(function () {

    Route::get('/dashboard', [AdminMainController::class, 'dashboard'])->name('dashboard');
    Route::resource('restaurant', AdminRestaurantController::class)->only([
        'create',
        'store'
    ]);
    Route::resource('orders', AdminOrderController::class)->only([
        'index',
        'show'
    ]);;
    Route::resource('dishes', AdminDishController::class);
    Route::get('/statistics', [AdminStatisticController::class, 'statistics'])->name('statistics');
    Route::get('/monthly-orders-data', 'App\Http\Controllers\Admin\StatisticController@monthlyOrdersData');
    Route::get('/yearly-orders-data', 'App\Http\Controllers\Admin\StatisticController@yearlyOrdersData');
});


require __DIR__.'/auth.php';
