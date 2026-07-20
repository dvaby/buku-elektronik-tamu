<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BukuTamuController extends Controller
{
    public function create()
    {
        return view('buku-tamu.create');
    }

    public function store(Request $request)
    {
        //
    }
}

