<?php

namespace App\Http\Controllers;

use App\Models\HargaPasar;
use Illuminate\Http\Request;

class HargaPasarController extends Controller
{
    public function index()
    {
        $hargaPasars = HargaPasar::orderBy('tanggal', 'desc')->get();
        return view('harga_pasar.index', compact('hargaPasars'));
    }

    public function create()
    {
        return view('harga_pasar.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'komoditas' => 'required|string|max:255',
            'wilayah'   => 'required|string|max:255',
            'satuan'    => 'required|string|max:50',
            'harga'     => 'required|integer|min:0',
            'tanggal'   => 'required|date',
            'keterangan' => 'nullable|string',
        ]);

        HargaPasar::create($request->all());

        return redirect()->route('harga-pasar.index')->with('success', 'Data harga pasar berhasil ditambahkan.');
    }

    public function edit(HargaPasar $hargaPasar)
    {
        return view('harga_pasar.edit', compact('hargaPasar'));
    }

    public function update(Request $request, HargaPasar $hargaPasar)
    {
        $request->validate([
            'komoditas' => 'required|string|max:255',
            'wilayah'   => 'required|string|max:255',
            'satuan'    => 'required|string|max:50',
            'harga'     => 'required|integer|min:0',
            'tanggal'   => 'required|date',
            'keterangan' => 'nullable|string',
        ]);

        $hargaPasar->update($request->all());

        return redirect()->route('harga-pasar.index')->with('success', 'Data harga pasar berhasil diperbarui.');
    }

    public function destroy(HargaPasar $hargaPasar)
    {
        $hargaPasar->delete();
        return redirect()->route('harga-pasar.index')->with('success', 'Data harga pasar berhasil dihapus.');
    }
}
