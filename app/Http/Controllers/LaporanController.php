<?php

namespace App\Http\Controllers;

use App\Models\BukuTamu;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class LaporanController extends Controller
{
    public function harian(Request $request)
    {
        $tanggal = $request->input('tanggal', now()->format('Y-m-d'));

        $dataTamu = BukuTamu::whereDate('created_at', $tanggal)
            ->latest()
            ->paginate(10)
            ->withQueryString();

        return view('laporan.harian', compact('dataTamu', 'tanggal'));
    }

    public function bulanan(Request $request)
    {
        $tahun = $request->input('tahun', now()->year);
        $bulan = $request->input('bulan', now()->month);

        $dataTamu = BukuTamu::whereYear('created_at', $tahun)
            ->whereMonth('created_at', $bulan)
            ->latest()
            ->paginate(10)
            ->withQueryString();

        $tahunTersedia = $this->tahunTersedia();

        return view('laporan.bulanan', compact('dataTamu', 'tahun', 'bulan', 'tahunTersedia'));
    }

    public function tahunan(Request $request)
    {
        $tahun = $request->input('tahun', now()->year);

        $dataTamu = BukuTamu::whereYear('created_at', $tahun)
            ->latest()
            ->paginate(10)
            ->withQueryString();

        $tahunTersedia = $this->tahunTersedia();

        return view('laporan.tahunan', compact('dataTamu', 'tahun', 'tahunTersedia'));
    }

    public function custom(Request $request)
    {
        $dariTanggal = $request->input('dari_tanggal');
        $sampaiTanggal = $request->input('sampai_tanggal');
        $dataTamu = null;

        if ($dariTanggal && $sampaiTanggal) {
            $dataTamu = BukuTamu::whereDate('created_at', '>=', $dariTanggal)
                ->whereDate('created_at', '<=', $sampaiTanggal)
                ->latest()
                ->paginate(10)
                ->withQueryString();
        }

        return view('laporan.custom', compact('dataTamu', 'dariTanggal', 'sampaiTanggal'));
    }

    private function tahunTersedia()
    {
        $tahunTersedia = BukuTamu::pluck('created_at')
            ->map(fn ($tanggal) => Carbon::parse($tanggal)->year)
            ->unique()
            ->sortDesc()
            ->values();

        return $tahunTersedia->isEmpty() ? collect([now()->year]) : $tahunTersedia;
    }
}