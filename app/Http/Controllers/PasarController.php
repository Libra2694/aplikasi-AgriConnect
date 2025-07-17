<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PasarController extends Controller
{
    public function index()
    {
        return view('pages.pasar');
    }
}