<?php

namespace App\Http\Controllers;

use App\Models\PenggunaanObat;
use App\Models\Tanaman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PenggunaanObatController extends Controller
{
    public function index()
    {
        $penggunaanObats = PenggunaanObat::with('tanaman')
            ->whereHas('tanaman', function ($query) {
                $query->where('user_id', Auth::id());
            })
            ->latest()
            ->get();

        return view('penggunaan_obat.index', compact('penggunaanObats'));
    }

    public function create()
    {
        $tanamans = Tanaman::where('user_id', Auth::id())->get();
        return view('penggunaan_obat.create', compact('tanamans'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'tanaman_id' => 'required|exists:tanamen,id',
            'nama_obat' => 'required|string|max:255',
            'dosis' => 'required|string|max:100',
            'tanggal' => 'required|date',
            'catatan' => 'nullable|string',
        ]);

        PenggunaanObat::create([
            'tanaman_id' => $request->tanaman_id,
            'nama_obat' => $request->nama_obat,
            'dosis' => $request->dosis,
            'tanggal' => $request->tanggal,
            'catatan' => $request->catatan,
        ]);

        return redirect()->route('penggunaan-obat.index')->with('success', 'Data penggunaan obat berhasil ditambahkan.');
    }

    public function edit(PenggunaanObat $penggunaanObat)
    {
        $tanamans = Tanaman::where('user_id', Auth::id())->get();
        return view('penggunaan_obat.edit', compact('penggunaanObat', 'tanamans'));
    }

    public function update(Request $request, PenggunaanObat $penggunaanObat)
    {
        $request->validate([
            'tanaman_id' => 'required|exists:tanamen,id',
            'nama_obat' => 'required|string|max:255',
            'dosis' => 'required|string|max:100',
            'tanggal' => 'required|date',
            'catatan' => 'nullable|string',
        ]);

        $penggunaanObat->update([
            'tanaman_id' => $request->tanaman_id,
            'nama_obat' => $request->nama_obat,
            'dosis' => $request->dosis,
            'tanggal' => $request->tanggal,
            'catatan' => $request->catatan,
        ]);

        return redirect()->route('penggunaan-obat.index')->with('success', 'Penggunaan obat berhasil diperbarui.');
    }

    public function destroy(PenggunaanObat $penggunaanObat)
    {
        $penggunaanObat->delete();
        return back()->with('success', 'Penggunaan obat berhasil dihapus.');
    }
}
