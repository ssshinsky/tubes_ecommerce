<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pemesanan extends Model{
    use HasFactory;

    public $timestamps = false;
    protected $table = 'pemesanan';
    protected $primaryKey = 'id';

    protected $fillable = [
        'id_produk',
        'status',
        'total_harga',
        'alamat_pemesanan',
        'tanggal_pemesanan',
    ];

    public function produk(){
        return $this->belongsTo(Produk::class, 'id_produk');
    }
}