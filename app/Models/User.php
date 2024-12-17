<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable{
    use HasApiTokens, HasFactory, Notifiable;

    public $timestamps = false;
    protected $table = 'user';
    protected $primaryKey = 'id';

    protected $fillable = [
        'profile_picture',
        'nama',
        'email',
        'password',
        'no_telp',
        'alamat',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function transaksi(){
        return $this->hasMany(Transaksi::class);
    }

    public function review(){
        return $this->hasMany(Review::class);
    }
}