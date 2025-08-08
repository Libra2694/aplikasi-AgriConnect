<?php

namespace App\Http\Controllers;

use App\Models\Tanaman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TanamanController extends Controller
{
    public function index()
    {
        $tanamans = Tanaman::where('user_id', Auth::id())->latest()->get();
        return view('tanaman.index', compact('tanamans'));
    }

    public function create()
    {
        return view('tanaman.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_tanaman' => 'required|string|max:255',
            'jenis' => 'nullable|string|max:255',
            'tanggal_tanam' => 'required|date',
            'perkiraan_panen' => 'nullable|date',
            'deskripsi' => 'nullable|string',
        ]);

        Tanaman::create([
            'user_id' => Auth::id(),
            'nama_tanaman' => $request->nama_tanaman,
            'jenis' => $request->jenis,
            'tanggal_tanam' => $request->tanggal_tanam,
            'perkiraan_panen' => $request->perkiraan_panen,
            'deskripsi' => $request->deskripsi,
        ]);

        return redirect()->route('tanaman.index')->with('success', 'Data tanaman berhasil ditambahkan.');
    }

    public function edit(Tanaman $tanaman)
    {
        // Tidak menggunakan authorize
        return view('tanaman.edit', compact('tanaman'));
    }

    public function update(Request $request, Tanaman $tanaman)
    {
        // Tidak menggunakan authorize

        $request->validate([
            'nama_tanaman' => 'required|string|max:255',
            'jenis' => 'nullable|string|max:255',
            'tanggal_tanam' => 'required|date',
            'perkiraan_panen' => 'nullable|date',
            'deskripsi' => 'nullable|string',
        ]);

        $tanaman->update($request->only([
            'nama_tanaman',
            'jenis',
            'tanggal_tanam',
            'perkiraan_panen',
            'deskripsi',
        ]));

        return redirect()->route('tanaman.index')->with('success', 'Data tanaman berhasil diperbarui.');
    }

    public function destroy(Tanaman $tanaman)
    {
        // Tidak menggunakan authorize
        $tanaman->delete();
        return back()->with('success', 'Data tanaman berhasil dihapus.');
    }
}
