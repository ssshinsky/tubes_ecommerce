<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Transaksi;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class TransaksiController extends Controller{
    public function index(){
        $transaksi = Transaksi::inRandomOrder()->get();
        
        return response([
            'message' => 'All Transactions Retrieved!',
            'data' => $transaksi
        ], 200);
    }

    public function show(string $id){
        $transaksi = Transaksi::findOrFail($id);

        return response([
            'message' => 'Transaction Found!',
            'data' => $transaksi
        ], 200);
    }

    public function store(Request $request){
        $storeData = $request->all();
    
        $validate = Validator::make($storeData, [
            'tanggal_transaksi' => 'required|date',
            'metode_pembayaran' => 'required|in:Transfer,Debit,GoPay,OVO,DANA,ShoopePay',
            'status' => 'required',
            'quantity' => 'required|integer|min:1',
            'total' => 'required|numeric|min:0',
            'product_name' => 'required|string',
            'product_id' => 'required|integer|exists:produk,id',
        ]);
    
        if($validate->fails()){
            return response(['message' => $validate->errors()], 400);
        }
        
        $user = Auth::user();
        if(!$user){
            return response(['message' => 'User Not Found!'], 404);
        }
        $storeData['id_user'] = $user->id;
    
        $transaksi = Transaksi::create($storeData);
    
        return response([
            'message' => 'Transaction Added Successfully!',
            'data' => $transaksi,
        ], 201);
    }
    

    public function update(Request $request, string $id){
        $transaksi = Transaksi::findOrFail($id);

        $updateData = $request->all();
        
        $validate = Validator::make($updateData, [
            'tanggal_transaksi' => 'required|date',
            'metode_pembayaran' => 'required|in:Transfer,Debit,GoPay,OVO,DANA,ShoopePay',
            'status' => 'required',
        ]);
        if($validate->fails()){
            return response(['message' => $validate->errors()], 400);
        }

        $transaksi->update($updateData);

        return response([
            'message' => 'Transaction Updated Successfully!',
            'data' => $transaksi,
        ], 200);
    }

    public function destroy(string $id){
        $transaksi = Transaksi::findOrFail($id);
        
        if($transaksi->delete()){
            return response([
                'message' => 'Transaction Deleted Successfully!',
                'data' => $transaksi,
            ], 200);
        }

        return response([
            'message' => 'Delete Transaction Failed!',
            'data' => null,
        ], 400);
    }
}