<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Produk;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class ProdukController extends Controller{
    public function index(){
        $produk = Produk::inRandomOrder()->get();

        return response([
            'message' => 'All Products Retrieved!',
            'data' => $produk
        ], 200);
    }

    public function show(string $id){
        $produk = Produk::findOrFail($id);

        return response([
            'message' => 'Product Found!',
            'data' => $produk
        ], 200);
    }

    public function store(Request $request){
        $storeData = $request->all();

        $validate = Validator::make($storeData, [
            'gambar_produk' => 'required|image:jpeg,png,jpg,gif,svg|max:2048',
            'nama' => 'required',
            'harga' => 'required|numeric',
            'kategori' => 'required|in:Kucing,Anjing,Hewan Kecil,Reptil,Unggas',
            'deskripsi' => 'required',
            'stok' => 'required',
        ]);
        if($validate->fails()){
            return response(['message' => $validate->errors()], 400);
        }

        $uploadFolder = 'produk';
        $image = $request->file('gambar_produk');
        $image_uploaded_path = $image->store($uploadFolder, 'public');
        $uploadedImageResponse = basename($image_uploaded_path);

        $storeData['gambar_produk'] = $uploadedImageResponse;

        $produk = Produk::create($storeData);

        return response([
            'message' => 'Product Added Successfully!',
            'data' => $produk,
        ], 201);
    }

    public function update(Request $request, string $id){
        $produk = Produk::findOrFail($id);

        $updateData = $request->all();
        
        $validate = Validator::make($updateData, [
            'gambar_produk' => 'nullable|image:jpeg,png,jpg,gif,svg|max:2048',
            'nama' => 'required',
            'harga' => 'required|numeric',
            'kategori' => 'required|in:Kucing,Anjing,Hewan Kecil,Reptil,Unggas',
            'deskripsi' => 'required',
            'stok' => 'required',
        ]);
        if($validate->fails()){
            return response(['message' => $validate->errors()], 400);
        }

        if($request->hasFile('gambar_produk')){
            $uploadFolder = 'produk';
            $image = $request->file('gambar_produk');
            $image_uploaded_path = $image->store($uploadFolder, 'public');
            $uploadedImageResponse = basename($image_uploaded_path);

            Storage::disk('public')->delete('produk/'.$produk->gambar_produk);

            $updateData['gambar_produk'] = $uploadedImageResponse;
        }

        $produk->update($updateData);

        return response([
            'message' => 'Product Updated Successfully!',
            'data' => $produk,
        ], 200);
    }

    public function destroy(string $id){
        $produk = Produk::findOrFail($id);
        
        if($produk->delete()){
            return response([
                'message' => 'Product Deleted Successfully!',
                'data' => $produk,
            ], 200);
        }

        return response([
            'message' => 'Delete Product Failed!',
            'data' => null,
        ], 400);
    }
}