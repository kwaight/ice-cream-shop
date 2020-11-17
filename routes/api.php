<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('products', [\App\Http\Controllers\ProductController::class, 'products'])->name('products');
Route::post('order', [\App\Http\Controllers\OrderController::class, 'createOrder'])->name('createOrder');
