<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ProdukController extends Controller{
    public function index(){
        $produk = Produk::all(); 
        return view('daftarBarang', compact('produk'));
    }


    public function home(){
        $produk = Produk::inRandomOrder()->get();

        return view('Home', compact('produk'));
    }

    public function kucing(){
        $produk = Produk::inRandomOrder()->get();

        return view('kucing', compact('produk'));
    }

    public function show($id)
    {
        $produk = Produk::findOrFail($id); 

        return response()->json([
            'message' => 'Product Found!',
            'data' => $produk
        ], 200);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required|string|max:255',
            'harga' => 'required|numeric',
            'kategori' => 'required|in:Kucing,Anjing,Hewan Kecil,Reptil,Unggas',
            'deskripsi' => 'required|string',
            'stok' => 'required|numeric',
            'gambar_produk' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
    
        if ($validator->fails()) {
            return response()->json([
                'message' => 'Validasi gagal',
                'errors' => $validator->errors()
            ], 400);
        }
    
        // Upload Gambar
        $uploadFolder = 'produk';
        $image = $request->file('gambar_produk');
        $imagePath = $image->store($uploadFolder, 'public');
        $imageFileName = basename($imagePath);
    
        // Simpan Data Produk
        $produk = Produk::create([
            'nama' => $request->nama,
            'harga' => $request->harga,
            'kategori' => $request->kategori,
            'deskripsi' => $request->deskripsi,
            'stok' => $request->stok,
            'gambar_produk' => $imageFileName,
        ]);
    
        return response('Produk berhasil ditambahkan!', 200);

    }
    

    public function update(Request $request, $id)
    {
        // Find the product by ID
        $produk = Produk::findOrFail($id);

        // Validate incoming request
        $validator = Validator::make($request->all(), [
            'nama' => 'required|string|max:255',
            'harga' => 'required|numeric',
            'kategori' => 'required|in:Kucing,Anjing,Hewan Kecil,Reptil,Unggas',
            'deskripsi' => 'required|string',
            'stok' => 'required|numeric',
            'gambar_produk' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Validation failed',
                'errors' => $validator->errors()
            ], 400);
        }

        if ($request->hasFile('gambar_produk')) {
            $uploadFolder = 'produk';
            $image = $request->file('gambar_produk');
            $imagePath = $image->store($uploadFolder, 'public');
            $imageFileName = basename($imagePath);
            if ($produk->gambar_produk) {
                Storage::disk('public')->delete('produk/' . $produk->gambar_produk);
            }
            $produk->gambar_produk = $imageFileName;
        }
        $produk->update($request->except(['gambar_produk']));
        return response('Produk berhasil di update!', 200);
    }

    public function destroy($id)
    {
        $produk = Produk::findOrFail($id);
        if ($produk->gambar_produk) {
            Storage::disk('public')->delete('produk/' . $produk->gambar_produk);
        }
        if ($produk->delete()) {
            return response('Produk berhasil di delete!', 200);
        }
        

    }
}
