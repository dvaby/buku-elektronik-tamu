<?php

namespace App\Http\Controllers;

use App\Models\BukuTamu;
use Illuminate\Support\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        // Statistik ringkas
        $totalTamu = BukuTamu::count();
        $tamuHariIni = BukuTamu::whereDate('created_at', today())->count();
        $tamuBulanIni = BukuTamu::whereMonth('created_at', now()->month)
            ->whereYear('created_at', now()->year)
            ->count();
        $totalLakiLaki = BukuTamu::where('jenis_kelamin', 'Laki-laki')->count();
        $totalPerempuan = BukuTamu::where('jenis_kelamin', 'Perempuan')->count();

        // Data grafik: jumlah kunjungan 7 hari terakhir
        $grafikTanggal = [];
        $grafikJumlah = [];
        for ($i = 6; $i >= 0; $i--) {
            $tanggal = Carbon::today()->subDays($i);
            $grafikTanggal[] = $tanggal->translatedFormat('d M');
            $grafikJumlah[] = BukuTamu::whereDate('created_at', $tanggal)->count();
        }

        // Data tabel (terbaru dulu, dengan pagination)
        $dataTamu = BukuTamu::latest()->paginate(10);

        return view('dashboard', compact(
            'totalTamu',
            'tamuHariIni',
            'tamuBulanIni',
            'totalLakiLaki',
            'totalPerempuan',
            'grafikTanggal',
            'grafikJumlah',
            'dataTamu'
        ));
    }
}