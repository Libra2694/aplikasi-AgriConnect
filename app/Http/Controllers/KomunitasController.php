<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KomunitasController extends Controller
{
    /**
     * Tampilkan halaman komunitas petani.
     */
public function index()
{
    return view('komunitas.index');
}

    public function show($id)
{
    // Contoh data dummy untuk topik & komentar
    $topik = [
        'id' => $id,
        'judul' => 'Cara Mengatasi Hama Wereng',
        'penulis' => 'Pak Budi',
        'konten' => 'Bagaimana cara efektif mengatasi hama wereng pada tanaman padi?',
        'waktu' => '2 jam yang lalu'
    ];

    $komentar = session('komentar_' . $id, []); // ambil dari session sementara

    return view('komunitas.show', compact('topik', 'komentar'));
}

public function komentar(Request $request, $id)
{
    $request->validate([
        'nama' => 'required',
        'isi' => 'required',
    ]);

    $komentarBaru = [
        'nama' => $request->input('nama'),
        'isi' => $request->input('isi'),
        'waktu' => now()->diffForHumans()
    ];

    // Simpan komentar sementara di session
    $komentar = session('komentar_' . $id, []);
    $komentar[] = $komentarBaru;
    session(['komentar_' . $id => $komentar]);

    return redirect()->route('komunitas.show', $id)->with('success', 'Komentar berhasil ditambahkan!');
}
public function create()
{
    return view('komunitas.create');
}

public function store(Request $request)
{
    $request->validate([
        'judul' => 'required',
        'nama' => 'required',
        'konten' => 'required',
    ]);

    // Simpan ke session sebagai dummy
    $topik = session('topik', []);
    $topik[] = [
        'id' => count($topik) + 1,
        'judul' => $request->judul,
        'penulis' => $request->nama,
        'konten' => $request->konten,
        'waktu' => now()->diffForHumans(),
    ];
    session(['topik' => $topik]);

    return redirect()->route('komunitas.index')->with('success', 'Topik berhasil dibuat!');
}

}
