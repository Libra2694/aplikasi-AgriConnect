<?php

namespace App\Http\Controllers;

use App\Models\ManajemenPertanian;
use Illuminate\Http\Request;

class ManajemenPertanianController extends Controller
{
    public function index()
    {
        $data = ManajemenPertanian::all();
        return view('pertanian.index', compact('data'));
    }

    public function create()
    {
        return view('pertanian.create');
    }

    public function store(Request $request)
    {
        ManajemenPertanian::create($request->all());
        return redirect()->route('pertanian.index')->with('success', 'Data berhasil ditambahkan');
    }

    public function edit($id)
    {
        $data = ManajemenPertanian::findOrFail($id);
        return view('pertanian.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $data = ManajemenPertanian::findOrFail($id);
        $data->update($request->all());
        return redirect()->route('pertanian.index')->with('success', 'Data berhasil diupdate');
    }

    public function destroy($id)
    {
        $data = ManajemenPertanian::findOrFail($id);
        $data->delete();
        return redirect()->route('pertanian.index')->with('success', 'Data berhasil dihapus');
    }
}
