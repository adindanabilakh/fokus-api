<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['umkm_id', 'name', 'description', 'price', 'image'];

    public function umkm()
    {
        return $this->belongsTo(UMKM::class, 'umkm_id');
    }
}
