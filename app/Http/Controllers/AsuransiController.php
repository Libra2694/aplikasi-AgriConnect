<?php

namespace App\Http\Controllers;

use App\Models\Asuransi;
use Illuminate\Http\Request;

class AsuransiController extends Controller
{
    public function index()
    {
        $dataAsuransi = Asuransi::all();
        return view('asuransi.index', compact('dataAsuransi'));
    }

    public function create()
    {
        return view('asuransi.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:100',
            'jenis_tanaman' => 'required|string|max:100',
            'luas_lahan' => 'required|numeric',
            'lokasi' => 'required|string|max:255',
        ]);

        Asuransi::create($validated);

        return redirect()->route('asuransi.index')->with('success', 'Data berhasil disimpan.');
    }

    public function destroy($id)
    {
        $data = Asuransi::findOrFail($id);
        $data->delete();
        return back()->with('success', 'Data berhasil dihapus.');
    }
}
