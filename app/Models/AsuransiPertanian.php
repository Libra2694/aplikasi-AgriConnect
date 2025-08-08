<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AsuransiPertanian extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'tanaman_id',
        'jenis_asuransi',
        'tanggal_daftar',
        'status',
        'catatan',
    ];

    // Relasi ke pengguna (petani)
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relasi ke tanaman
    public function tanaman()
    {
        return $this->belongsTo(Tanaman::class);
    }
}
