<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HargaPasar extends Model
{
    use HasFactory;

    protected $fillable = [
        'komoditas',
        'wilayah',
        'satuan',
        'harga',
        'tanggal',
        'keterangan',
    ];
}
