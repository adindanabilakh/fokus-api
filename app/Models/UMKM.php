<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable; // 🔥 Tambahkan ini
use Illuminate\Auth\Authenticatable as AuthenticatableTrait; // 🔥 Tambahkan ini
use Laravel\Sanctum\HasApiTokens;

class UMKM extends Model implements Authenticatable // 🔥 Pastikan ini diimplementasikan
{
    use HasFactory, AuthenticatableTrait, HasApiTokens; // ✅ Tambahkan HasApiTokens

    protected $table = "u_m_k_m_s";

    protected $fillable = [
        'name',
        'type',
        'status',
        'address',
        'location_url',
        'email',
        'phone_number',
        'password',
        'document',
        'images',
        'description', // 🔥 Tambahkan kolom description
        'open_time',
        'close_time',
    ];



    protected $hidden = [
        'password',
    ];

    protected $casts = [
        'password' => 'hashed',
        'images' => 'array', // 🆕 Cast images ke array agar bisa digunakan sebagai array
    ];

    public function products()
    {
        return $this->hasMany(Product::class, 'umkm_id');
    }
}
