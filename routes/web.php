<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\SummaryController;
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
    Route::get('/order/{code}', [OrderController::class, 'showOrder'])->name('user.order.show');
});


// Admin Route
Route::prefix('admin')->middleware(['role.session'])->group(function () {
    // Manage Dashboard Route
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    });
    // Manage Users Route
    Route::resource('users', UserController::class);
    // Manage Packages Route
    Route::resource('packages', PackageController::class);
    // Manage Orders Route
    Route::resource('orders', OrderController::class);
});

// Auth Route
Route::prefix('auth')->group(function () {
    Route::get('login', [AuthController::class, 'showLoginForm'])->name('login')->middleware('logged');
    Route::post('login', [AuthController::class, 'login'])->middleware('logged');
    Route::post('logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('register', [AuthController::class, 'showRegisterForm'])->name('register')->middleware('logged');
    Route::post('register', [AuthController::class, 'register'])->middleware('logged');
});
