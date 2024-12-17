<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Storage;


class Produk extends Model
{
    use HasFactory;

    protected $table = 'produk';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = [
        'gambar_produk',
        'nama',
        'harga',
        'kategori',
        'deskripsi',
        'stok',
    ];

    public function pemesanan()
    {
        return $this->hasMany(Pemesanan::class, 'produk_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');  
    }


    public function getGambarProdukAttribute($value)
    {
        return url(Storage::url('produk/' . $value)); 
    }
}
