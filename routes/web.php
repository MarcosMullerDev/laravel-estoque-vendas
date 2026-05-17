<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

Route::get('/', function () {
    return redirect('/dashboard');
});

Route::get('/dashboard', [ProductController::class, 'dashboard'])
    ->name('dashboard');

Route::resource('products', ProductController::class);

Route::post('/products/{product}/sell', [ProductController::class, 'sell'])
    ->name('products.sell');