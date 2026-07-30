<?php

namespace App\Http\Controllers;

use App\Models\BukuTamu;
use Illuminate\Http\Request;

class PengunjungController extends Controller
{
    public function index(Request $request)
    {
        $query = BukuTamu::latest();

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('nama', 'like', "%{$search}%")
                  ->orWhere('instansi_alamat', 'like', "%{$search}%")
                  ->orWhere('keperluan', 'like', "%{$search}%")
                  ->orWhere('no_hp', 'like', "%{$search}%");
            });
        }

        $perPage = $request->input('per_page', 10);
        $dataTamu = $query->paginate($perPage)->withQueryString();

        return view('pengunjung.index', compact('dataTamu'));
    }
}