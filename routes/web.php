<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\PemesananController;
use App\Models\Produk;



Route::get('/daftarBarang', [ProdukController::class, 'index'])->name('daftarBarang.index');

Route::get('/daftarBarang', function (){
    return view('daftarBarang');
});

Route::get('/', function () {
    return view('loginAndRegister'); // Halaman login dan register
});

Route::view('/bayar', 'bayar');
Route::view('/berhasilbayar', 'berhasilbayar');
Route::view('/pilihbayar', 'pilihbayar');
Route::view('/cart', 'cart');
Route::view('/terima', 'terima');
Route::view('/review', 'review');
Route::view('/selesai', 'selesai');

Route::get('/login', [UserController::class, 'showLoginForm'])->name('login');
Route::post('/login', [UserController::class, 'login']);
Route::get('/register', [UserController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [UserController::class, 'register'])->name('register');

Route::post('/pemesanan', [PemesananController::class, 'store']);
Route::get('/pilihbayar', function () {
    return view('pilihbayar');
});
Route::get('/loginAndRegister', function () {
    return view('LoginAndRegister');
});

Route::get('/profile', function () {
    return view('Profile');
});

Route::get('/Home', function (){
    return view('Home');
})->name('Home');

Route::get('/beli', function (){
    return view('beli');
});

Route::get('/beli/{id}', function ($id) {
    $item = Produk::findOrFail($id);
    return view('beli', ['item' => $item]);
});

Route::get('/kucing', function (){
    return view('kucing');
});

Route::get('/dashboard', function () {
    $members = [
        ['name' => 'user1', 'transaction_count' => 1, 'total_spent' => 1000000, 'avatar' => 'images/user.png'],
        ['name' => 'user2', 'transaction_count' => 1, 'total_spent' => 1000000, 'avatar' => 'images/user.png'],
        ['name' => 'user3', 'transaction_count' => 1, 'total_spent' => 1000000, 'avatar' => 'images/user.png'], 
        ['name' => 'user4', 'transaction_count' => 1, 'total_spent' => 1000000, 'avatar' => 'images/user.png'], 
        ['name' => 'user5', 'transaction_count' => 1, 'total_spent' => 1000000, 'avatar' => 'images/user.png'], 
        ['name' => 'user6', 'transaction_count' => 1, 'total_spent' => 1000000, 'avatar' => 'images/user.png'], 
        ['name' => 'user7', 'transaction_count' => 1, 'total_spent' => 1000000, 'avatar' => 'images/user.png'], 
        ['name' => 'user8', 'transaction_count' => 1, 'total_spent' => 1000000, 'avatar' => 'images/user.png'], 
    ];

    return view('dashboard', ['members' => $members]);
});

Route::get('/konfirmasiPembayaran', function () {
    $pembayaran = [
        ['nama_member' => 'user1', 'jumlah' => 1000000, 'status' => 'Pending', 'tanggal' => '22 Oktober 2024'],
        ['nama_member' => 'user2', 'jumlah' => 1000000, 'status' => 'Pending', 'tanggal' => '22 Oktober 2024'],
        ['nama_member' => 'user3', 'jumlah' => 1000000, 'status' => 'Pending', 'tanggal' => '22 Oktober 2024'],
        ['nama_member' => 'user4', 'jumlah' => 1000000, 'status' => 'Pending', 'tanggal' => '22 Oktober 2024'],
        ['nama_member' => 'user5', 'jumlah' => 1000000, 'status' => 'Pending', 'tanggal' => '22 Oktober 2024'],
        ['nama_member' => 'user6', 'jumlah' => 1000000, 'status' => 'Pending', 'tanggal' => '22 Oktober 2024'],
        ['nama_member' => 'user7', 'jumlah' => 1000000, 'status' => 'Pending', 'tanggal' => '22 Oktober 2024'],
        ['nama_member' => 'user8', 'jumlah' => 1000000, 'status' => 'Pending', 'tanggal' => '22 Oktober 2024'],
    ];
    return view('konfirmasiPembayaran', ['pembayaran' => $pembayaran]);
});



Route::get('/barangterjual', function () {
    $sales = [
        ['nama_pembelian' => 'Beauty cat food 1 kg makanan kucing hair skin ', 'jumlah_barang' => 2, 'harga' => 27231, 'image' => 'images/produk.png'],
        ['nama_pembelian' => 'Beauty cat food 1 kg makanan kucing hair skin ', 'jumlah_barang' => 2, 'harga' => 27231, 'image' => 'images/produk.png'],
        ['nama_pembelian' => 'Beauty cat food 1 kg makanan kucing hair skin ', 'jumlah_barang' => 2, 'harga' => 27231, 'image' => 'images/produk.png'],
        ['nama_pembelian' => 'Beauty cat food 1 kg makanan kucing hair skin ', 'jumlah_barang' => 2, 'harga' => 27231, 'image' => 'images/produk.png'],
        ['nama_pembelian' => 'Beauty cat food 1 kg makanan kucing hair skin ', 'jumlah_barang' => 2, 'harga' => 27231, 'image' => 'images/produk.png'],
        ['nama_pembelian' => 'Beauty cat food 1 kg makanan kucing hair skin ', 'jumlah_barang' => 2, 'harga' => 27231, 'image' => 'images/produk.png'],
        ['nama_pembelian' => 'Beauty cat food 1 kg makanan kucing hair skin ', 'jumlah_barang' => 2, 'harga' => 27231, 'image' => 'images/produk.png'],
        ['nama_pembelian' => 'Beauty cat food 1 kg makanan kucing hair skin ', 'jumlah_barang' => 2, 'harga' => 27231, 'image' => 'images/produk.png'],
    ];

    return view('barangterjual', ['sales' => $sales]);
});

Route::get('/pendapatan', function () {
    $pendapatan = [
        ['bulan' => 'Januari', 'total' => 5000000],
        ['bulan' => 'Februari', 'total' => 6000000],
        ['bulan' => 'Maret', 'total' => 7000000],
        ['bulan' => 'April', 'total' => 8000000],
        ['bulan' => 'Mei', 'total' => 9000000],
        ['bulan' => 'Juni', 'total' => 10000000],
        ['bulan' => 'Juli', 'total' => 100000000],
        ['bulan' => 'Agustus', 'total' => 1000000000],
    ];

    return view('pendapatan', ['pendapatan' => $pendapatan]); 
});

Route::get('/rating', function () {
    $ratings = [
        ['nama_produk' => 'Beauty cat food 1 kg makanan kucing hair skin ', 'rating' => 4.5],
        ['nama_produk' => 'Beauty cat food 1 kg makanan kucing hair skin ', 'rating' => 4.0],
        ['nama_produk' => 'Beauty cat food 1 kg makanan kucing hair skin ', 'rating' => 5.0],
        ['nama_produk' => 'Beauty cat food 1 kg makanan kucing hair skin ', 'rating' => 3.5],
        ['nama_produk' => 'Beauty cat food 1 kg makanan kucing hair skin ', 'rating' => 4.8],
        ['nama_produk' => 'Beauty cat food 1 kg makanan kucing hair skin ', 'rating' => 4.9],
        ['nama_produk' => 'Beauty cat food 1 kg makanan kucing hair skin ', 'rating' => 5.0],
    ];

    return view('rating', ['ratings' => $ratings]); 
});



Route::get('/Home', [ProdukController::class, 'home'])->name('home');

Route::get('/kucing', [ProdukController::class, 'kucing'])->name('kucing');

// Route::get('/daftarBarang', function () {
//     $items = [
//         (object)[
//             'id' => 1,
//             'nama_barang' => 'Beauty Cat Food 1kg',
//             'kategori' => 'Makanan Kucing',
//             'harga' => 27231,
//             'stok' => 50,
//         ],
//         (object)[
//             'id' => 2,
//             'nama_barang' => 'Cat Toy',
//             'kategori' => 'Mainan Kucing',
//             'harga' => 15000,
//             'stok' => 100,
//         ],
//         (object)[
//             'id' => 3,
//             'nama_barang' => 'Cat Shampoo 500ml',
//             'kategori' => 'Perawatan Kucing',
//             'harga' => 75000,
//             'stok' => 30,
//         ],
//         (object)[
//             'id' => 4,
//             'nama_barang' => 'Cat Litter 5kg',
//             'kategori' => 'Perawatan Kucing',
//             'harga' => 120000,
//             'stok' => 20,
//         ],
//     ];

//     return view('daftarBarang', ['items' => $items]);
// });
Route::get('/daftarBarang', [ProdukController::class, 'index'])->name('produk.index');


// Route::get('/daftarBarang', [daftarBarangController::class, 'index'])->name('daftarBarang.index');
// Route::post('/daftarBarang', [daftarBarangController::class, 'store'])->name('daftarBarang.store');
// Route::delete('/daftarBarang/{id}', [daftarBarangController::class, 'destroy'])->name('daftarBarang.destroy');
// Route::get('/daftarBarang/{id}/edit', [daftarBarangController::class, 'edit'])->name('daftarBarang.edit');
// Route::put('/daftarBarang/{id}', [daftarBarangController::class, 'update'])->name('daftarBarang.update');
