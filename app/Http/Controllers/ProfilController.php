<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Topik;
use App\Models\Komentar;
use Illuminate\Support\Facades\Auth;

class ProfilController extends Controller
{
    public function index()
    {
        return view('profil.index')->with('user', Auth::user());
    }

    public function topik()
    {
        $topik = Topik::where('user_id', Auth::id())->latest()->get();
        return view('profil.topik', compact('topik'));
    }

    public function komentar()
    {
        $komentar = Komentar::where('user_id', Auth::id())->latest()->get();
        return view('profil.komentar', compact('komentar'));
    }

    public function edit()
    {
        return view('profil.edit')->with('user', Auth::user());
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        return redirect()->route('profil.index')->with('success', 'Profil berhasil diperbarui.');
    }
}

