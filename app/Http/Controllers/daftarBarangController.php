<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;

class DaftarBarangController extends Controller
{
    public function index()
    {
        $items = Barang::all(); 
        return view('daftarBarang', compact('items')); 
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_barang' => 'required|string|max:255',
            'kategori' => 'required|string|max:255',
            'harga' => 'required|numeric',
            'stok' => 'required|numeric',
        ]);

        Barang::create([
            'nama_barang' => $request->nama_barang,
            'kategori' => $request->kategori,
            'harga' => $request->harga,
            'stok' => $request->stok,
        ]);

        return redirect()->route('daftarBarang.index')->with('success', 'Barang berhasil ditambahkan');
    }

    public function destroy($id)
    {
        $item = Barang::findOrFail($id); 
        $item->delete(); 
        return redirect()->route('daftarBarang.index')->with('success', 'Barang berhasil dihapus');
    }
}
