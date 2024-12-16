<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Review extends Model{
    use HasFactory;

    public $timestamps = false;
    protected $table = 'review';
    protected $primaryKey = 'id';

    protected $fillable = [
        'id_transaksi',
        'id_user',
        'rating',
        'isi',
        'tanggal_review',
    ];

    public function transaksi(){
        return $this->belongsTo(Transaksi::class, 'id_transaksi');
    }

    public function user(){
        return $this->belongsTo(User::class, 'id_user');
    }
}