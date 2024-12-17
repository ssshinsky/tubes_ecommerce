<?php

use App\Http\Controllers\PemesananController;
use App\Http\Controllers\PendapatanController;
use App\Http\Controllers\PengirimanController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProdukController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::post('/register', [UserController::class, 'register'])->name('register');
Route::post('/login', [UserController::class, 'login'])->name('login');

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/profile', [UserController::class, 'showProfile'])->name('profile');
    Route::post('/profile/update', [UserController::class, 'updateProfile'])->name('profile.update');
    Route::post('/profile/picture/update', [UserController::class, 'updateProfilePicture'])->name('profile.updatePicture');
    Route::post('/logout', [UserController::class, 'logout'])->name('logout');

    Route::get('/transaksi',[TransaksiController::class,'index'])->name('transaksi.index');
    Route::post('/transaksi',[TransaksiController::class,'store'])->name('transaksi.store');
    Route::get('/transaksi/{id}',[TransaksiController::class,'show'])->name('transaksi.show');
    Route::post('/transaksi/{id}',[TransaksiController::class,'update'])->name('transaksi.update');
    Route::delete('/transaksi/{id}',[TransaksiController::class,'destroy'])->name('transaksi.destroy');

    Route::get('/pengiriman',[PengirimanController::class,'index'])->name('pengiriman.index');
    Route::post('/pengiriman',[PengirimanController::class,'store'])->name('pengiriman.store');
    Route::get('/pengiriman/{id}',[PengirimanController::class,'show'])->name('pengiriman.show');
    Route::post('/pengiriman/{id}',[PengirimanController::class,'update'])->name('pengiriman.update');
    Route::delete('/pengiriman/{id}',[PengirimanController::class,'destroy'])->name('pengiriman.destroy');

    Route::get('/review',[ReviewController::class,'index'])->name('review.index');
    Route::post('/review',[ReviewController::class,'store'])->name('review.store');
    Route::get('/review/{id}',[ReviewController::class,'show'])->name('review.show');
    Route::post('/review/{id}',[ReviewController::class,'update'])->name('review.update');
    Route::delete('/review/{id}',[ReviewController::class,'destroy'])->name('review.destroy');

    Route::get('/pemesanan',[PemesananController::class,'index'])->name('pemesanan.index');
    Route::post('/pemesanan',[PemesananController::class,'store'])->name('pemesanan.store');
    Route::get('/pemesanan/{id}',[PemesananController::class,'show'])->name('pemesanan.show');
    Route::post('/pemesanan/{id}',[PemesananController::class,'update'])->name('pemesanan.update');
    Route::delete('/pemesanan/{id}',[PemesananController::class,'destroy'])->name('pemesanan.destroy');

    Route::get('/pendapatan',[PendapatanController::class,'index'])->name('pendapatan.index');
    Route::post('/pendapatan',[PendapatanController::class,'store'])->name('pendapatan.store');
    Route::get('/pendapatan/{id}',[PendapatanController::class,'show'])->name('pendapatan.show');
    Route::post('/pendapatan/{id}',[PendapatanController::class,'update'])->name('pendapatan.update');
    Route::delete('/pendapatan/{id}',[PendapatanController::class,'destroy'])->name('pendapatan.destroy');
});

Route::get('/produk',[ProdukController::class,'index'])->name('produk.index');
Route::post('/produk',[ProdukController::class,'store'])->name('produk.store');
Route::get('/produk/{id}',[ProdukController::class,'show'])->name('produk.show');
Route::post('/produk/{id}',[ProdukController::class,'update'])->name('produk.update');
Route::delete('/produk/{id}',[ProdukController::class,'destroy'])->name('produk.destroy');
