<?php

use Illuminate\Support\Facades\Route;

// Controllers
use App\Http\Controllers\MainController;
use App\Http\Controllers\Admin\MainController as AdminMainController;
use App\Http\Controllers\Admin\RestaurantController as AdminRestaurantController; 
use App\Http\Controllers\Admin\TypologyController as AdminTypologyController;
use App\Http\Controllers\Admin\OrderController as AdminOrderController; 
use App\Http\Controllers\Admin\DishController as AdminDishController;

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
    Route::resource('restaurants', AdminRestaurantController::class);
    Route::resource('typologies', AdminTypologyController::class);
    Route::resource('orders', AdminOrderController::class);
    Route::resource('dishes', AdminDishController::class);

});

require __DIR__.'/auth.php';
