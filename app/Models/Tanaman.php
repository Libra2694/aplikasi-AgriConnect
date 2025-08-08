<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tanaman extends Model
{
    use HasFactory;

    protected $table = 'tanamen';

    protected $fillable = [
        'user_id',
        'nama_tanaman',
        'jenis',
        'tanggal_tanam',
        'perkiraan_panen',
        'deskripsi',
    ];

    public function kegiatans()
    {
        return $this->hasMany(Kegiatan::class);
    }

    public function penggunaanObats()
    {
        return $this->hasMany(PenggunaanObat::class);
    }
}
