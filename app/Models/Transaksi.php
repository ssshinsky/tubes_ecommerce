<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Transaksi extends Model{
    use HasFactory;

    public $timestamps = false;
    protected $table = 'transaksi';
    protected $primaryKey = 'id';

    protected $fillable = [
        'id_pemesanan',
        'tanggal_transaksi',
        'metode_pembayaran',
        'status',
    ];

    public function pemesanan(){
        return $this->belongsTo(User::class, 'id_pemesanan');
    }

    public function pengiriman(){
        return $this->hasOne(Pengiriman::class);
    }
}