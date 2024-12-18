<?php

namespace App\Http\Controllers;

use App\Models\Pemesanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class PemesananController extends Controller{
    public function index(){
        $pemesanan = Pemesanan::with(['produk'])->inRandomOrder()->get();
        return response()->json(['message' => 'All Orders Retrieved!', 'data' => $pemesanan]);
    }

    public function show($id){
        $pemesanan = Pemesanan::findOrFail($id);
        return response()->json(['message' => 'Order Found!', 'data' => $pemesanan]);
    }

    public function store(Request $request){
        $validate = Validator::make($request->all(), [
            'id_produk' => 'required|exists:produk,id',
            'status' => 'required',
            'total_harga' => 'required|numeric',
            'alamat_pemesanan' => 'required',
            'tanggal_pemesanan' => 'required|date',
        ]);

        if($validate->fails()){
            return response()->json(['message' => $validate->errors()], 400);
        }

        $pemesanan = Pemesanan::create($validate->validated());
        return response()->json(['message' => 'Order Added Successfully!', 'data' => $pemesanan], 201);
    }

    public function update(Request $request, $id){
        $pemesanan = Pemesanan::findOrFail($id);

        $validate = Validator::make($request->all(), [
            'id_produk' => 'required|exists:produk,id',
            'status' => 'required',
            'total_harga' => 'required|numeric',
            'alamat_pemesanan' => 'required',
            'tanggal_pemesanan' => 'required|date',
        ]);

        if($validate->fails()){
            return response()->json(['message' => $validate->errors()], 400);
        }

        $pemesanan->update($validate->validated());
        return response()->json(['message' => 'Order Updated Successfully!', 'data' => $pemesanan]);
    }

    public function destroy($id){
        $pemesanan = Pemesanan::findOrFail($id);
        $pemesanan->delete();
        return response()->json(['message' => 'Order Deleted Successfully!'], 204);
    }

    public function addToCart(Request $request){
        $validate = Validator::make($request->all(), [
            'id_produk' => 'required|exists:produk,id',
            'quantity' => 'required|integer|min:1',
            'total_harga' => 'required|numeric',
        ]);

        if($validate->fails()){
            return response()->json(['message' => $validate->errors()], 400);
        }

        try{
            $cart = Pemesanan::create([
                'id_produk' => $request->id_produk,
                'status' => 'cart',
                'total_harga' => $request->total_harga,
                'alamat_pemesanan' => '',
                'tanggal_pemesanan' => now(),
            ]);

            return response()->json(['message' => 'Item added to cart successfully!', 'data' => $cart], 201);
        }catch(\Exception $e){
            Log::error('Add to Cart Error: ' . $e->getMessage());
            return response()->json(['message' => 'Failed to add item to cart.'], 500);
        }
    }

    public function fetchCart(){
        try{
            $cartItems = Pemesanan::with('produk')->where('status', 'cart')->get();

            \Log::info('Fetched Cart Items:', $cartItems->toArray());

            return response()->json([
                'message' => 'Cart items retrieved successfully!',
                'data' => $cartItems
            ], 200);
        }catch(\Exception $e){
            \Log::error('Fetch Cart Error:', ['error' => $e->getMessage()]);
            return response()->json([
                'message' => 'Failed to fetch cart items',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function removeFromCart($id){
        $pemesanan = Pemesanan::find($id);

        if(!$pemesanan || $pemesanan->status !== 'cart'){
            return response()->json(['message' => 'Item not found or not in cart'], 404);
        }

        try{
            $pemesanan->delete();
            return response()->json(['message' => 'Item removed from cart successfully']);
        }catch(\Exception $e){
            return response()->json(['message' => 'Failed to delete item', 'error' => $e->getMessage()], 500);
        }
    }
}