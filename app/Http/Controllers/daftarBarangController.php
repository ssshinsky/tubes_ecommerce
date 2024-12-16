<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;
use Illuminate\Support\Facades\Storage;

class daftarBarangController extends Controller
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
            'deskripsi' => 'nullable|string',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'harga' => 'required|numeric|min:0',
            'stok' => 'required|numeric|min:0',
        ]);

        $gambarPath = null;

        if ($request->hasFile('gambar')) {
            $gambarPath = $request->file('gambar')->store('barang', 'public');
        }

        Barang::create([
            'nama_barang' => $request->nama_barang,
            'kategori' => $request->kategori,
            'deskripsi' => $request->deskripsi,
            'gambar' => $gambarPath,
            'harga' => $request->harga,
            'stok' => $request->stok,
        ]);

        return redirect()->route('daftarBarang.index')->with('success', 'Barang berhasil ditambahkan.');
    }

    public function destroy($id)
    {
        $barang = Barang::findOrFail($id);

        if ($barang->gambar) {
            Storage::disk('public')->delete($barang->gambar);
        }

        $barang->delete();

        return redirect()->route('daftarBarang.index')->with('success', 'Barang berhasil dihapus.');
    }

    public function edit($id)
    {
        $barang = Barang::findOrFail($id);
        return view('editBarang', compact('barang'));
    }

    public function update(Request $request, $id)
    {
        $barang = Barang::findOrFail($id);

        $request->validate([
            'nama_barang' => 'required|string|max:255',
            'kategori' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'harga' => 'required|numeric|min:0',
            'stok' => 'required|numeric|min:0',
        ]);

        if ($request->hasFile('gambar')) {
            if ($barang->gambar) {
                Storage::disk('public')->delete($barang->gambar);
            }
            $gambarPath = $request->file('gambar')->store('barang', 'public');
            $barang->gambar = $gambarPath;
        }

        $barang->update($request->except('gambar'));

        return redirect()->route('daftarBarang.index')->with('success', 'Barang berhasil diperbarui.');
    }
}
