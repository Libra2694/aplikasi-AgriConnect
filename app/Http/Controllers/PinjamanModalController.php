<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PinjamanModal;
use Illuminate\Support\Facades\Auth;

class PinjamanModalController extends Controller
{
    public function index()
    {
        $pinjamans = PinjamanModal::where('user_id', Auth::id())->get();
        return view('pinjaman.index', compact('pinjamans'));
    }

    public function create()
    {
        return view('pinjaman.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_usaha' => 'required|string',
            'jumlah' => 'required|numeric|min:1000',
            'alasan' => 'required|string',
            'tanggal_pengajuan' => 'required|date',
        ]);

        PinjamanModal::create([
            'user_id' => Auth::id(),
            'nama_usaha' => $request->nama_usaha,
            'jumlah' => $request->jumlah,
            'alasan' => $request->alasan,
            'tanggal_pengajuan' => $request->tanggal_pengajuan,
            'status' => 'pending',
        ]);

        return redirect()->route('pinjaman.index')->with('success', 'Pengajuan berhasil.');
    }

    public function destroy($id)
    {
        $p = PinjamanModal::findOrFail($id);
        if ($p->user_id !== Auth::id()) abort(403);
        $p->delete();

        return redirect()->route('pinjaman.index')->with('success', 'Pengajuan dihapus.');
    }
}
