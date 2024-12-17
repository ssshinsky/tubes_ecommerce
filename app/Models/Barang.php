<?php

namespace App\Models;  // Pastikan ini berada di atas file model Anda

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;
    
    protected $table = 'barangs';
    protected $primaryKey = 'id_barang';

    protected $fillable = [
        'nama_barang',
        'kategori',
        'deskripsi',
        'gambar',
        'harga',
        'stok',
    ];

    protected $dates = ['created_at', 'updated_at'];
}
