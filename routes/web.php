<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\RoleMiddleware;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('home.index');
// });

Route::get('/order', [PackageController::class, 'listForUser'])->name('user.orders.create')->middleware('auth');

// Admin Route
Route::prefix('admin')->group(function () {
    // Manage Users Route
    Route::resource('users', UserController::class);
    // Manage Packages Route
    Route::resource('packages', PackageController::class);
    // Manage Orders Route
    Route::resource('orders', OrderController::class);
})->middleware('auth');

// Auth Route
Route::prefix('auth')->group(function () {
    Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('login', [AuthController::class, 'login']);
    Route::post('logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('register', [AuthController::class, 'showRegisterForm'])->name('register');
    Route::post('register', [AuthController::class, 'register']);
});
