<?php

namespace App\Http\Controllers;

use App\Models\Pemesanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log; // Pastikan menggunakan facade Log

class PemesananController extends Controller
{
    public function store(Request $request)
    {
        try{
            $validated = $request->validate([
                'id_produk' => '',
                'tanggal_pemesanan' => 'required',
                'total_harga' => 'required|float',
                'alamat_pemesanan' => 'required|string|max:255',
                'status' => 'required',
                'metode_pembayaran' => 'required|string|max:255',
            ]);

            
            $idPelanggan = Auth::user()->id_user;

            $transaksi = Pemesanan::create([
                'id_user' => $idPelanggan,
                'id_produk' => $request->id_produk,
                'tanggal_pemesanan' => now(),
                'status' => $request->status,
                'alamat_pemesanan' => $request->alamat_pemesanan,
                'metode_pembayaran' => $request->metode_pembayaran,
                'total_harga' => $request->total_harga,
            ]);

            $user = Auth::user();

            $product = Produk::find($transaksi->id_produk);

            $pesen = collect([
                'users' => $user,
                'transaksi' => $transaksi,
            ]);

            return view('berhasilbayar', compact('pesen'));

        }catch(Exception $e){
            dd($e);
            return redirect()->back()->withErrors($e);
        }
    }

}
