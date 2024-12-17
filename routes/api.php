<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdukController;
use Illuminate\Support\Facades\Auth;
Route::get('/produk', [ProdukController::class, 'index']);
Route::post('produk', [ProdukController::class, 'store']);
Route::get('produk/{id}', [ProdukController::class, 'show']);
Route::put('produk/{id}', [ProdukController::class, 'update']);
Route::delete('produk/{id}', [ProdukController::class, 'destroy']);

Route::get('/produk', [ProdukController::class, 'getProduk']);
Route::post('/produk', [ProdukController::class, 'store']);