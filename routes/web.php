<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SalesController;

Route::get('/', function () {
    return view('welcome');
});


Route::resource('products', ProductController::class);
Route::resource('sales', SalesController::class)->except(['edit', 'update', 'destroy']);

Route::get('sales/{id}/print', [SalesController::class, 'print'])->name('sales.print');


