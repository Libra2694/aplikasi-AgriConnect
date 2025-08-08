<?php

namespace App\Http\Controllers;

use App\Models\InformasiPetani;
use Illuminate\Http\Request;

class InformasiPetaniController extends Controller
{
    // Menampilkan semua informasi
    public function index()
    {
        $data = InformasiPetani::latest()->get();
        return view('informasi.index', compact('data'));
    }

    // Menampilkan form tambah
    public function create()
    {
        return view('informasi.create');
    }

    // Menyimpan data baru
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'kategori' => 'required|in:Hama,Penyakit,Tips,Cuaca,Lainnya',
            'konten' => 'required|string',
            'tanggal_terbit' => 'required|date',
        ]);

        InformasiPetani::create($request->all());

        return redirect()->route('informasi.index')->with('success', 'Informasi berhasil ditambahkan.');
    }

    // Menampilkan detail informasi
    public function show($id)
    {
        $info = InformasiPetani::findOrFail($id);
        return view('informasi.show', compact('info'));
    }

    // Menampilkan form edit
    public function edit($id)
    {
        $info = InformasiPetani::findOrFail($id);
        return view('informasi.edit', compact('info'));
    }

    // Menyimpan perubahan data
    public function update(Request $request, $id)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'kategori' => 'required|in:Hama,Penyakit,Tips,Cuaca,Lainnya',
            'konten' => 'required|string',
            'tanggal_terbit' => 'required|date',
        ]);

        $info = InformasiPetani::findOrFail($id);
        $info->update($request->all());

        return redirect()->route('informasi.index')->with('success', 'Informasi berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $info = InformasiPetani::findOrFail($id);
        $info->delete();

        return redirect()->route('informasi.index')->with('success', 'Informasi berhasil dihapus.');
    }
}
