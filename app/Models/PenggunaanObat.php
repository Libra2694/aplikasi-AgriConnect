<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PenggunaanObat extends Model
{
    use HasFactory;

    protected $fillable = [
        'tanaman_id',
        'tanggal',
        'nama_obat',
        'dosis',
        'catatan',
    ];

    protected $casts = [
        'tanggal' => 'date', // Penting agar bisa diformat dengan Carbon
    ];

    public function tanaman()
    {
        return $this->belongsTo(Tanaman::class, 'tanaman_id');
    }
}
