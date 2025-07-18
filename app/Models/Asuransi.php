<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asuransi extends Model
{
    use HasFactory;

    protected $fillable = ['nama', 'jenis_tanaman', 'luas_lahan', 'lokasi'];
}
