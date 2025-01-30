<?php

use App\Http\Controllers\OrderController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('home.index');
// });

Route::get('/order', function () {
    return view('user.orders.index');
});

// Admin Route
Route::prefix('admin')->group(function () {
    // Manage Users Route
    Route::resource('users', UserController::class);
    // Manage Packages Route
    Route::resource('packages', PackageController::class);
    // Manage Orders Route
    Route::resource('orders', OrderController::class);
});
