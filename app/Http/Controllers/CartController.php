<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        $cart = session()->get('cart', []);
        return view('cart', compact('cart'));
    }

    public function removeFromCart($productId)
    {
        $cart = session()->get('cart', []);

        // Hapus produk dari keranjang
        if(isset($cart[$productId])) {
            unset($cart[$productId]);
        }

        // Simpan kembali keranjang ke sesi
        session()->put('cart', $cart);

        return redirect()->route('cart');
    }

    public function addToCart(Request $request, $productId)
    {
        // Mendapatkan data produk dari form
        $image = $request->input('image');
        $name = $request->input('name');
        $price = $request->input('price');
        $quantity = $request->input('quantity');

        // Membuat data produk untuk keranjang
        $product = [
            'image' => $image,
            'name' => $name,
            'price' => $price,
            'quantity' => $quantity
        ];

        // Menyimpan produk ke dalam session
        $cart = session()->get('cart', []);
        $cart[$productId] = $product;
        session()->put('cart', $cart);

        session()->flash('success', 'Produk berhasil ditambahkan ke keranjang!');

        return redirect()->back();
    }
    public function updateQuantity(Request $request, $productId)
    {
        // Ambil data keranjang dari session
        $cart = session()->get('cart', []);

        // Pastikan produk ada dalam keranjang
        if(isset($cart[$productId])) {
            // Update quantity produk
            $cart[$productId]['quantity'] = $request->quantity;

            // Simpan kembali data keranjang ke session
            session()->put('cart', $cart);

            // Redirect kembali dengan pesan sukses
            return redirect()->route('cart')->with('success', 'Jumlah produk berhasil diperbarui!');
        }

        return redirect()->route('cart')->with('error', 'Produk tidak ditemukan dalam keranjang!');
    }
}
