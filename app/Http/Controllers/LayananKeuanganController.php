<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class LayananKeuanganController extends Controller
{
    public function index()
    {
        return view('keuangan.index');
    }
}