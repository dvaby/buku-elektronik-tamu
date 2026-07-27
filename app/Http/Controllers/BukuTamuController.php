<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BukuTamu;
use App\Models\Keperluan;

class BukuTamuController extends Controller
{
    public function create()
    {
        $keperluans = Keperluan::orderBy('nama')->get();
    return view('buku-tamu.create', compact('keperluans'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'identitas' => 'required|string|max:255',
            'no_hp' => 'nullable|string|max:20',
            'instansi_alamat' => 'required|string|max:255',
            'keperluan' => 'required|string|max:255',
            'nama' => 'required|string|max:255',
            'pegawai_temui' => 'nullable|string|max:255',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'anda_sendirian' => 'required|in:Hanya saya,Rombongan',
            'jumlah_rombongan' => 'nullable|integer|min:2|required_if:anda_sendirian,Rombongan',
            'usia' => 'required|integer|min:1',
        ]);

        BukuTamu::create($validated);

        return redirect()->route('buku-tamu.create')->with('success', 'Terima kasih, data berhasil disimpan!');
    
    
        }
}