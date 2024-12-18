<?php

namespace App\Http\Controllers;

use App\Models\Pemesanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log; // Pastikan menggunakan facade Log

class PemesananController extends Controller
{
    public function index()
    {
        $pemesanan = Pemesanan::with(['transaksi', 'produk'])->inRandomOrder()->get();
        return response()->json(['message' => 'All Orders Retrieved!', 'data' => $pemesanan]);
    }

    public function show($id)
    {
        $pemesanan = Pemesanan::findOrFail($id);
        return response()->json(['message' => 'Order Found!', 'data' => $pemesanan]);
    }

    public function store(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'id_produk' => 'required|exists:produk,id',
            'status' => 'required',
            'total_harga' => 'required|numeric',
            'alamat_pemesanan' => 'required',
            'tanggal_pemesanan' => 'required|date',
        ]);

        if ($validate->fails()) {
            return response()->json(['message' => $validate->errors()], 400);
        }

        $pemesanan = Pemesanan::create($validate->validated());
        return response()->json(['message' => 'Order Added Successfully!', 'data' => $pemesanan], 201);
    }

    public function update(Request $request, $id)
    {
        $pemesanan = Pemesanan::findOrFail($id);

        $validate = Validator::make($request->all(), [
            'id_transaksi' => 'required|exists:transaksi,id',
            'id_produk' => 'required|exists:produk,id',
            'status' => 'required',
            'total_harga' => 'required|numeric',
            'alamat_pemesanan' => 'required',
            'tanggal_pemesanan' => 'required|date',
        ]);

        if ($validate->fails()) {
            return response()->json(['message' => $validate->errors()], 400);
        }

        $pemesanan->update($validate->validated());
        return response()->json(['message' => 'Order Updated Successfully!', 'data' => $pemesanan]);
    }

    public function destroy($id)
    {
        $pemesanan = Pemesanan::findOrFail($id);
        $pemesanan->delete();
        return response()->json(['message' => 'Order Deleted Successfully!'], 204);
    }
}
