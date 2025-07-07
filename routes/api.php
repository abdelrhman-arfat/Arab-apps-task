<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::middleware('throttle:api')->get('/products', [ProductController::class, 'getProductAfterFiltering']);
Route::get('/products/export', [ProductController::class, 'exportToPDF']);
