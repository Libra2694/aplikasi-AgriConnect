<?php

namespace App\Http\Controllers;

use App\Models\Tanaman;
use App\Models\Kegiatan;
use App\Models\PenggunaanObat;
use Illuminate\Support\Facades\Auth;

class ManajemenPertanianController extends Controller
{
    public function index()
    {
        $userId = Auth::id();

        $jumlah_tanaman = Tanaman::where('user_id', $userId)->count();

        $jumlah_kegiatan = Kegiatan::whereHas('tanaman', function ($query) use ($userId) {
            $query->where('user_id', $userId);
        })->count();

        $jumlah_obat = PenggunaanObat::whereHas('tanaman', function ($query) use ($userId) {
            $query->where('user_id', $userId);
        })->count();

        $tanaman_terbaru = Tanaman::where('user_id', $userId)
            ->latest()
            ->take(3)
            ->get();

        $kegiatan_terbaru = Kegiatan::with('tanaman')
            ->whereHas('tanaman', function ($query) use ($userId) {
                $query->where('user_id', $userId);
            })
            ->latest()
            ->take(3)
            ->get();

        $obat_terbaru = PenggunaanObat::with('tanaman')
            ->whereHas('tanaman', function ($query) use ($userId) {
                $query->where('user_id', $userId);
            })
            ->latest()
            ->take(3)
            ->get();

        return view('manajemen.index', compact(
            'jumlah_tanaman',
            'jumlah_kegiatan',
            'jumlah_obat',
            'tanaman_terbaru',
            'kegiatan_terbaru',
            'obat_terbaru'
        ));
    }
}
