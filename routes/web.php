<?php

use App\Http\Controllers\Admin\MainController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::middleware('role:maker')->prefix('admin')
    ->name('admin.')
    ->group(function () {
        Route::get('/', [MainController::class, 'index'])->name('index');
        Route::resource('/products', ProductController::class);
        Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
        Route::get('/orders/confirmed', [OrderController::class, 'confirmed'])->name('orders.confirmed');
        Route::put('/orders/{id}/approved', [OrderController::class, 'approved'])->name('orders.approved');
        Route::put('/orders/{id}/reject', [OrderController::class, 'reject'])->name('orders.reject');
    });

Route::middleware('guest')->controller(UserController::class)->group(function () {
    Route::get('/signin', 'loginForm')->name('login.create');
    Route::post('/signin', 'login')->name('login');
});

Route::get('/logout', [UserController::class, 'logout'])->name('logout')->middleware('auth');
