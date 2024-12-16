<?php

namespace App\Models;  // Pastikan ini berada di atas file model Anda

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;

    protected $table = 'barang';

    protected $fillable = [
        'nama_barang',
        'kategori',
        'harga',
        'stok',
    ];

    protected $dates = ['created_at', 'updated_at'];
}
