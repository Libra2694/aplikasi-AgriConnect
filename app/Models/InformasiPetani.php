<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InformasiPetani extends Model
{
    protected $fillable = [
        'judul',
        'kategori',
        'konten',
        'tanggal_terbit',
    ];

    protected $casts = [
        'tanggal_terbit' => 'datetime',
    ];
}
