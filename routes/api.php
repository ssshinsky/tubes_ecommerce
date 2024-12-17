<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProdukController;
use Illuminate\Support\Facades\Auth;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/register', [UserController::class, 'register']);

Route::post('/login', [UserController::class, 'login']);

Route::get('/Home', [ProdukController::class, 'home'])->name('home');
Route::get('/kucing', [ProdukController::class, 'kucing'])->name('kucing');
Route::get('/beli/{id}', function ($id) {
    $item = Produk::findOrFail($id); 
    return view('beli', ['item' => $item]);
});

Route::get('/produk', [ProdukController::class, 'index']);
Route::post('/produk', [ProdukController::class, 'store'])->name('daftarBarang.store');
Route::get('produk/{id}', [ProdukController::class, 'show']);
Route::put('produk/{id}', [ProdukController::class, 'update']);
Route::delete('produk/{id}', [ProdukController::class, 'destroy']);

Route::get('/produk', [ProdukController::class, 'getProduk']);
Route::post('/produk', [ProdukController::class, 'store']);
