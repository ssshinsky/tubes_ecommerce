<?php

namespace App\Http\Controllers;

use App\Models\Barangs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class BarangsController extends Controller
{
    public function index()
    {
        $barangs = Barangs::all();
        return view('barangs.daftarBarangs', compact('barangs')); // View untuk daftar barang
    }

    public function create()
    {
        return view('barangs.tambahBarang'); // View untuk menambahkan barang
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
            return redirect()->back()->withErrors($validator)->withInput();
        }

        if ($request->hasFile('gambar_produk')) {
            $uploadFolder = 'barangs';
            $image = $request->file('gambar_produk');
            $imagePath = $image->store($uploadFolder, 'public');
            $imageFileName = basename($imagePath);
        } else {
            $imageFileName = null;
        }

        Barangs::create([
            'nama' => $request->nama,
            'harga' => $request->harga,
            'kategori' => $request->kategori,
            'deskripsi' => $request->deskripsi,
            'stok' => $request->stok,
            'gambar_produk' => $imageFileName,
        ]);

        return redirect()->route('barangs.index')->with('message', 'Barang Berhasil Ditambahkan!');
    }

    public function edit($id)
    {
        $barang = Barangs::findOrFail($id);
        return view('barangs.editBarang', compact('barang')); // View untuk mengedit barang
    }

    public function update(Request $request, $id)
    {
        $barang = Barangs::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'nama' => 'required|string|max:255',
            'harga' => 'required|numeric',
            'kategori' => 'required|in:Kucing,Anjing,Hewan Kecil,Reptil,Unggas',
            'deskripsi' => 'required|string',
            'stok' => 'required|numeric',
            'gambar_produk' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        if ($request->hasFile('gambar_produk')) {
            $uploadFolder = 'barangs';
            $image = $request->file('gambar_produk');
            $imagePath = $image->store($uploadFolder, 'public');
            $imageFileName = basename($imagePath);

            if ($barang->gambar_produk) {
                Storage::disk('public')->delete('barangs/' . $barang->gambar_produk);
            }
            $barang->gambar_produk = $imageFileName;
        }

        $barang->update($request->except(['gambar_produk']));
        return redirect()->route('barangs.index')->with('message', 'Barang Berhasil Diperbarui!');
    }

    public function destroy($id)
    {
        $barang = Barangs::findOrFail($id);

        if ($barang->gambar_produk) {
            Storage::disk('public')->delete('barangs/' . $barang->gambar_produk);
        }

        if ($barang->delete()) {
            return redirect()->route('barangs.index')->with('message', 'Barang Berhasil Dihapus!');
        }

        return redirect()->route('barangs.index')->with('message', 'Gagal Menghapus Barang!');
    }
}
