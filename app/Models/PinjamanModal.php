<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PinjamanModal extends Model
{
    protected $fillable = [
        'user_id',
        'nama_usaha',
        'jumlah',
        'alasan',
        'tanggal_pengajuan',
        'status',
    ];
}
