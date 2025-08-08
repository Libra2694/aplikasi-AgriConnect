<?php

namespace App\Http\Controllers;

use App\Models\Kegiatan;
use App\Models\Tanaman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KegiatanController extends Controller
{
    public function index()
    {
        $kegiatans = Kegiatan::with('tanaman')
            ->whereHas('tanaman', function ($query) {
                $query->where('user_id', Auth::id());
            })
            ->latest()
            ->get();

        return view('kegiatan.index', compact('kegiatans'));
    }

    public function create()
    {
        $tanamans = Tanaman::where('user_id', Auth::id())->get();
        return view('kegiatan.create', compact('tanamans'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'tanaman_id' => 'required|exists:tanamen,id', // disesuaikan
            'tanggal' => 'required|date',
            'jenis_kegiatan' => 'required|string|max:255',
            'catatan' => 'nullable|string',
        ]);

        Kegiatan::create($request->all());

        return redirect()->route('kegiatan.index')->with('success', 'Kegiatan berhasil ditambahkan.');
    }

    public function edit(Kegiatan $kegiatan)
    {
        $tanamans = Tanaman::where('user_id', Auth::id())->get();
        return view('kegiatan.edit', compact('kegiatan', 'tanamans'));
    }

    public function update(Request $request, Kegiatan $kegiatan)
    {
        $request->validate([
            'tanaman_id' => 'required|exists:tanamen,id', // disesuaikan
            'tanggal' => 'required|date',
            'jenis_kegiatan' => 'required|string|max:255',
            'catatan' => 'nullable|string',
        ]);

        $kegiatan->update($request->all());

        return redirect()->route('kegiatan.index')->with('success', 'Kegiatan berhasil diperbarui.');
    }

    public function destroy(Kegiatan $kegiatan)
    {
        $kegiatan->delete();
        return back()->with('success', 'Kegiatan berhasil dihapus.');
    }
}
