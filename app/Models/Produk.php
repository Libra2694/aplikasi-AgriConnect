<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Produk extends Model
{
    use HasFactory;

    protected $fillable = [
        'petani_id',
        'nama_produk',
        'kategori',
        'deskripsi',
        'harga_per_kg',
        'stok_kg',
        'satuan',
        'gambar',
        'status_produk',
    ];

    // Relasi ke user (petani)
    public function petani()
    {
        return $this->belongsTo(User::class, 'petani_id');
    }
}
