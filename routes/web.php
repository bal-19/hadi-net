<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home.index');
});
Route::get('/order', function () {
    return view('order.index');
});

// Admin Route
Route::prefix('admin')->group(function () {
    // Manage Users Route
    Route::resource('users', UserController::class);
});
