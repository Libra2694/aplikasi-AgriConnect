<?php

namespace App\Http\Controllers;

use App\Models\PinjamanModal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PinjamanModalController extends Controller
{
    public function index()
    {
        $pinjamans = PinjamanModal::where('user_id', Auth::id())->latest()->get();
        return view('pinjaman.index', compact('pinjamans'));
    }

    public function create()
    {
        return view('pinjaman.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'jumlah' => 'required|numeric|min:0',
            'tanggal_pengajuan' => 'required|date',
        ]);

        PinjamanModal::create([
            'user_id' => Auth::id(),
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'jumlah' => $request->jumlah,
            'tanggal_pengajuan' => $request->tanggal_pengajuan,
            'status' => 'Menunggu',
        ]);

        return redirect()->route('pinjaman-modal.index')->with('success', 'Pengajuan pinjaman berhasil dikirim.');
    }

    public function edit(PinjamanModal $pinjaman_modal)
    {
        if ($pinjaman_modal->user_id !== Auth::id()) abort(403);
        return view('pinjaman.edit', ['pinjaman' => $pinjaman_modal]);
    }

    public function update(Request $request, PinjamanModal $pinjaman_modal)
    {
        if ($pinjaman_modal->user_id !== Auth::id()) abort(403);

        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'jumlah' => 'required|numeric|min:0',
            'tanggal_pengajuan' => 'required|date',
        ]);

        $pinjaman_modal->update($request->only([
            'judul',
            'deskripsi',
            'jumlah',
            'tanggal_pengajuan'
        ]));

        return redirect()->route('pinjaman-modal.index')->with('success', 'Data pinjaman berhasil diperbarui.');
    }

    public function destroy(PinjamanModal $pinjaman_modal)
    {
        if ($pinjaman_modal->user_id !== Auth::id()) abort(403);
        $pinjaman_modal->delete();
        return back()->with('success', 'Data pinjaman berhasil dihapus.');
    }
}
