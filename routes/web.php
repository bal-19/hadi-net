<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home.index');
});
Route::get('/order', function () {
    return view('order.index');
});
