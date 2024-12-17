<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/register', [UserController::class, 'register']);

Route::post('/login', [UserController::class, 'login']);

Route::get('/Home', [ProdukController::class, 'home'])->name('home');
Route::get('/beli/{id}', function ($id) {
    $item = Produk::findOrFail($id); // Cari produk berdasarkan ID
    return view('beli', ['item' => $item]);
});
