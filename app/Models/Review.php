<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $fillable = [
        'umkm_id', 'rating', 'comment', 'guest_name', 'ip_address',
    ];
}
