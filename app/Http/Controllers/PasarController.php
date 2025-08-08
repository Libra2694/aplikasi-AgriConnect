<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PasarController extends Controller
{
    public function index()
    {
        $produk = Produk::where('petani_id', Auth::id())->latest()->get();
        return view('pasar.index', compact('produk'));
    }

    public function create()
    {
        return view('pasar.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_produk' => 'required|string|max:100',
            'kategori' => 'required|string',
            'deskripsi' => 'nullable|string',
            'harga_per_kg' => 'required|integer',
            'stok_kg' => 'required|integer',
            'satuan' => 'required|string|max:20',
            'gambar' => 'nullable|image|max:2048',
            'status_produk' => 'required|in:Tersedia,Habis,Nonaktif',
        ]);

        $gambarPath = null;
        if ($request->hasFile('gambar')) {
            $gambarPath = $request->file('gambar')->store('produk', 'public');
        }

        Produk::create([
            'petani_id' => Auth::id(),
            'nama_produk' => $request->nama_produk,
            'kategori' => $request->kategori,
            'deskripsi' => $request->deskripsi,
            'harga_per_kg' => $request->harga_per_kg,
            'stok_kg' => $request->stok_kg,
            'satuan' => $request->satuan,
            'gambar' => $gambarPath,
            'status_produk' => $request->status_produk,
        ]);

        return redirect()->route('produk.index')->with('success', 'Produk berhasil ditambahkan.');
    }

    public function edit(Produk $produk)
    {
        $this->authorizeProduk($produk);
        return view('pasar.edit', compact('produk'));
    }

    public function update(Request $request, Produk $produk)
    {
        $this->authorizeProduk($produk);

        $request->validate([
            'nama_produk' => 'required|string|max:100',
            'kategori' => 'required|string',
            'deskripsi' => 'nullable|string',
            'harga_per_kg' => 'required|integer',
            'stok_kg' => 'required|integer',
            'satuan' => 'required|string|max:20',
            'gambar' => 'nullable|image|max:2048',
            'status_produk' => 'required|in:Tersedia,Habis,Nonaktif',
        ]);

        if ($request->hasFile('gambar')) {
            if ($produk->gambar) {
                Storage::disk('public')->delete($produk->gambar);
            }
            $produk->gambar = $request->file('gambar')->store('produk', 'public');
        }

        $produk->update($request->only([
            'nama_produk',
            'kategori',
            'deskripsi',
            'harga_per_kg',
            'stok_kg',
            'satuan',
            'status_produk'
        ]) + ['gambar' => $produk->gambar]);

        return redirect()->route('produk.index')->with('success', 'Produk berhasil diperbarui.');
    }

    public function destroy(Produk $produk)
    {
        $this->authorizeProduk($produk);

        if ($produk->gambar) {
            Storage::disk('public')->delete($produk->gambar);
        }

        $produk->delete();

        return redirect()->route('produk.index')->with('success', 'Produk berhasil dihapus.');
    }

    private function authorizeProduk(Produk $produk)
    {
        if ($produk->petani_id !== Auth::id()) {
            abort(403, 'Akses ditolak');
        }
    }

    // show() bisa dipakai kalau kamu ingin tampilkan detail produk
    public function show(Produk $produk)
    {
        return view('pasar.show', compact('produk'));
    }
}
