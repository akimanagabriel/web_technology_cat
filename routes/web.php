<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;


Route::get('/', function () {
    return redirect('/login');
});

Auth::routes();

Route::middleware('auth')->group(function () {
    Route::get('/home', [ProductController::class,  'show'])->name('home');
    Route::resource('/product', ProductController::class);
});
