<?php

namespace App\Http\Controllers;

use App\Models\AsuransiPertanian;
use App\Models\Tanaman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AsuransiPertanianController extends Controller
{
    /**
     * Tampilkan daftar asuransi pertanian milik user.
     */
    public function index()
    {
        $asuransis = AsuransiPertanian::with('tanaman')
            ->where('user_id', Auth::id())
            ->latest()
            ->get();

        return view('asuransi.index', compact('asuransis'));
    }

    /**
     * Tampilkan form tambah data asuransi.
     */
    public function create()
    {
        $tanamans = Tanaman::where('user_id', Auth::id())->get();
        return view('asuransi.create', compact('tanamans'));
    }

    /**
     * Simpan data asuransi ke database.
     */
    public function store(Request $request)
    {
        $request->validate([
            'tanaman_id' => 'required|exists:tanamen,id', // perhatikan nama tabel
            'jenis_asuransi' => 'required|string|max:255',
            'tanggal_daftar' => 'required|date',
            'status' => 'nullable|in:Menunggu,Diterima,Ditolak', // validasi jika dikirim dari form
            'catatan' => 'nullable|string',
        ]);

        AsuransiPertanian::create([
            'user_id' => Auth::id(),
            'tanaman_id' => $request->tanaman_id,
            'jenis_asuransi' => $request->jenis_asuransi,
            'tanggal_daftar' => $request->tanggal_daftar,
            'status' => $request->status ?? 'Menunggu', // default Menunggu jika tidak dikirim
            'catatan' => $request->catatan,
        ]);

        return redirect()->route('asuransi.index')->with('success', 'Pengajuan asuransi berhasil ditambahkan.');
    }

    /**
     * Tampilkan form edit.
     */
    public function edit(AsuransiPertanian $asuransi)
    {
        if ($asuransi->user_id !== Auth::id()) {
            abort(403);
        }

        $tanamans = Tanaman::where('user_id', Auth::id())->get();
        return view('asuransi.edit', compact('asuransi', 'tanamans'));
    }

    /**
     * Update data asuransi.
     */
    public function update(Request $request, AsuransiPertanian $asuransi)
    {
        if ($asuransi->user_id !== Auth::id()) {
            abort(403);
        }

        $request->validate([
            'tanaman_id' => 'required|exists:tanamen,id',
            'jenis_asuransi' => 'required|string|max:255',
            'tanggal_daftar' => 'required|date',
            'status' => 'required|in:Menunggu,Diterima,Ditolak',
            'catatan' => 'nullable|string',
        ]);

        $asuransi->update($request->only([
            'tanaman_id',
            'jenis_asuransi',
            'tanggal_daftar',
            'status',
            'catatan'
        ]));

        return redirect()->route('asuransi.index')->with('success', 'Data asuransi berhasil diperbarui.');
    }

    /**
     * Hapus data asuransi.
     */
    public function destroy(AsuransiPertanian $asuransi)
    {
        if ($asuransi->user_id !== Auth::id()) {
            abort(403);
        }

        $asuransi->delete();

        return back()->with('success', 'Data asuransi berhasil dihapus.');
    }
}
