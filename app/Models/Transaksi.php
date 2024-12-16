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
        'id_user',
        'tanggal_transaksi',
        'metode_pembayaran',
        'status',
    ];

    public function user(){
        return $this->belongsTo(User::class, 'id_user');
    }

    public function pengiriman(){
        return $this->hasOne(Pengiriman::class);
    }

    public function pemesanan(){
        return $this->hasOne(Pemesanan::class);
    }
}