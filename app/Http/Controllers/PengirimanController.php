<?php

namespace App\Http\Controllers;

use App\Models\Pengiriman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PengirimanController extends Controller{
    public function index(){
        $pengiriman = Pengiriman::with(['transaksi'])->inRandomOrder()->get();

        return response([
            'message' => 'All Shipments Retrieved!',
            'data' => $pengiriman
        ], 200);
    }

    public function show(string $id){
        $pengiriman = Pengiriman::findOrFail($id);

        return response([
            'message' => 'Shimpent Found!',
            'data' => $pengiriman
        ], 200);
    }

    public function store(Request $request){
        $storeData = $request->all();

        $validate = Validator::make($storeData, [
            'id_transaksi' => 'required|exists:transaksi,id',
            'no_resi' => 'required',
            'tanggal_pengiriman' => 'required|date',
            'status' => 'required',
            'alamat_pengiriman' => 'required',
        ]);
        if($validate->fails()){
            return response(['message' => $validate->errors()], 400);
        }

        $pengiriman = Pengiriman::create($storeData);

        return response([
            'message' => 'Shipment Added Successfully!',
            'data' => $pengiriman,
        ], 201);
    }

    public function update(Request $request, string $id){
        $pengiriman = Pengiriman::findOrFail($id);

        $updateData = $request->all();
        
        $validate = Validator::make($updateData, [
            'id_transaksi' => 'required|exists:transaksi,id',
            'no_resi' => 'required',
            'tanggal_pengiriman' => 'required|date',
            'status' => 'required',
            'alamat_pengiriman' => 'required',
        ]);
        if($validate->fails()){
            return response(['message' => $validate->errors()], 400);
        }

        $pengiriman->update($updateData);

        return response([
            'message' => 'Shipment Updated Successfully!',
            'data' => $pengiriman,
        ], 200);
    }

    public function destroy(string $id){
        $pengiriman = Pengiriman::findOrFail($id);
        
        if($pengiriman->delete()){
            return response([
                'message' => 'Shipment Deleted Successfully!',
                'data' => $pengiriman,
            ], 204);
        }

        return response([
            'message' => 'Delete Shipment Failed!',
            'data' => null,
        ], 400);
    }
}