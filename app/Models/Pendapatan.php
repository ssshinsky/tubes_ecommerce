<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pendapatan extends Model{
    use HasFactory;

    public $timestamps = false;
    protected $table = 'pendapatan';
    protected $primaryKey = 'id';

    protected $fillable = [
        'id_pemesanan',
        'total_pendapatan',
    ];

    public function pemesanan(){
        return $this->hasMany(Transaksi::class, 'id_pemesanan');
    }
}