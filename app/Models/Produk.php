<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Produk extends Model{
    use HasFactory;

    public $timestamps = false;
    protected $table = 'produk';
    protected $primaryKey = 'id';

    protected $fillable = [
        'gambar_produk',
        'nama',
        'harga',
        'kategori',
        'deksripsi',
        'stok',
    ];

    public function pemesanan(){
        return $this->hasMany(Pemesanan::class);
    }
}