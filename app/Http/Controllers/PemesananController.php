<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pemesanan;
use Illuminate\Support\Facades\Validator;

class PemesananController extends Controller{
    public function index(){
        $pemesanan = Pemesanan::with(['transaksi', 'produk'])->inRandomOrder()->get();

        return response([
            'message' => 'All Order Retrieved!',
            'data' => $pemesanan
        ], 200);
    }

    public function show(string $id){
        $pemesanan = Pemesanan::findOrFail($id);

        return response([
            'message' => 'Order Found!',
            'data' => $pemesanan
        ], 200);
    }

    public function store(Request $request){
        $storeData = $request->all();

        $validate = Validator::make($storeData, [
            'id_transaksi' => 'required|exists:transaksi,id',
            'id_produk' => 'required|exists:produk,id',
            'status' => 'required',
            'total_harga' => 'required|numeric',
            'alamat_pemesanan' => 'required',
            'tanggal_pemesanan' => 'required|date',
        ]);
        if($validate->fails()){
            return response(['message' => $validate->errors()], 400);
        }

        $pemesanan = Pemesanan::create($storeData);

        return response([
            'message' => 'Order Added Successfully!',
            'data' => $pemesanan,
        ], 201);
    }

    public function update(Request $request, string $id){
        $pemesanan = Pemesanan::findOrFail($id);

        $updateData = $request->all();
        
        $validate = Validator::make($updateData, [
            'id_transaksi' => 'required|exists:transaksi,id',
            'id_produk' => 'required|exists:produk,id',
            'status' => 'required',
            'total_harga' => 'required|numeric',
            'alamat_pemesanan' => 'required',
            'tanggal_pemesanan' => 'required|date',
        ]);
        if($validate->fails()){
            return response(['message' => $validate->errors()], 400);
        }

        $pemesanan->update($updateData);

        return response([
            'message' => 'Order Updated Successfully!',
            'data' => $pemesanan,
        ], 200);
    }

    public function destroy(string $id){
        $pemesanan = Pemesanan::findOrFail($id);
        
        if($pemesanan->delete()){
            return response([
                'message' => 'Order Deleted Successfully!',
                'data' => $pemesanan,
            ], 204);
        }

        return response([
            'message' => 'Delete Order Failed!',
            'data' => null,
        ], 400);
    }
}