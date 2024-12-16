<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pengiriman extends Model{
    use HasFactory;

    public $timestamps = false;
    protected $table = 'pengiriman';
    protected $primaryKey = 'id';

    protected $fillable = [
        'id_transaksi',
        'no_resi',
        'tanggal_pengiriman',
        'status_pengiriman',
        'alamat_pengiriman',
    ];

    public function transaksi(){
        return $this->belongsTo(transaksi::class, 'id_transaksi');
    }
}