<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Income extends Model
{
    use HasFactory;

    protected $fillable = [
        'umkm_id',
        'amount',
        'source',
        'date',
        'notes',
    ];

    public function umkm()
    {
        return $this->belongsTo(UMKM::class);
    }
}
