<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// User Route
Route::get('/', function () {
    return view('user.home.index');
});

Route::middleware('auth')->group(function () {
    // order
    Route::get('/order', [OrderController::class, 'showOrderForm'])->name('user.order.index');
    Route::post('/order', [OrderController::class, 'createOrder'])->name('user.order.store');
    Route::get('/order/history', [OrderController::class, 'historyOrder'])->name('user.order.history');
    Route::post('/order/{order}/cancel', [OrderController::class, 'cancelOrder'])->name('user.order.cancel')->middleware('auth.order');;
    Route::get('/order/{order}', [OrderController::class, 'showOrder'])->name('user.order.show')->middleware('auth.order');
});


// Admin Route
Route::prefix('admin')->middleware(['role.session'])->group(function () {
    // Manage Dashboard Route
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
    // Manage Users Route
    Route::resource('users', UserController::class);
    // Manage Packages Route
    Route::resource('packages', PackageController::class);
    // Manage Orders Route
    Route::resource('orders', OrderController::class);
});

// Auth Route
Route::prefix('auth')->group(function () {
    Route::get('login', [AuthController::class, 'showLoginForm'])->name('login')->middleware('guest');
    Route::post('login', [AuthController::class, 'login'])->middleware('guest');
    Route::post('logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');
    Route::get('register', [AuthController::class, 'showRegisterForm'])->name('register')->middleware('guest');
    Route::post('register', [AuthController::class, 'register'])->middleware('guest');
});
