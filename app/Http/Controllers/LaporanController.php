<?php

namespace App\Http\Controllers;

use App\Models\BukuTamu;
use Barryvdh\DomPDF\Facade\Pdf;
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
        $tahun = $request->input('tahun', now()->year);
        $dataTamu = BukuTamu::whereYear('created_at', $tahun)
            ->latest()
            ->paginate(10)
            ->withQueryString();

        $tahunTersedia = $this->tahunTersedia();

        return view('laporan.custom', compact('dataTamu', 'tahun', 'tahunTersedia'));
    }

    public function harianPdf(Request $request)
    {
        $tanggal = $request->input('tanggal', now()->format('Y-m-d'));
        $dataTamu = BukuTamu::whereDate('created_at', $tanggal)
            ->latest()
            ->get();

        return $this->generatePdf('laporan.pdf-detail', [
            'dataTamu' => $dataTamu,
            'reportTitle' => 'Laporan Harian',
            'periodLabel' => Carbon::parse($tanggal)->format('d F Y'),
            'summary' => $this->pdfSummary($dataTamu),
        ], "laporan-harian-{$tanggal}.pdf", 'portrait');
    }

    public function bulananPdf(Request $request)
    {
        $tahun = $request->input('tahun', now()->year);
        $bulan = $request->input('bulan', now()->month);
        $dataTamu = BukuTamu::whereYear('created_at', $tahun)
            ->whereMonth('created_at', $bulan)
            ->latest()
            ->get();

        return $this->generatePdf('laporan.pdf-detail', [
            'dataTamu' => $dataTamu,
            'reportTitle' => 'Laporan Bulanan',
            'periodLabel' => Carbon::createFromDate($tahun, $bulan, 1)->format('F Y'),
            'summary' => $this->pdfSummary($dataTamu),
        ], "laporan-bulanan-{$tahun}-{$bulan}.pdf", 'portrait');
    }

    public function tahunanPdf(Request $request)
    {
        $tahun = $request->input('tahun', now()->year);
        $dataTamu = BukuTamu::whereYear('created_at', $tahun)
            ->latest()
            ->get();

        return $this->generatePdf('laporan.pdf-detail', [
            'dataTamu' => $dataTamu,
            'reportTitle' => 'Laporan Tahunan',
            'periodLabel' => $tahun,
            'summary' => $this->pdfSummary($dataTamu),
        ], "laporan-tahunan-{$tahun}.pdf", 'portrait');
    }

    public function customPdf(Request $request)
    {
        $tahun = $request->input('tahun', now()->year);
        $dataTamu = BukuTamu::whereYear('created_at', $tahun)
            ->latest()
            ->get();

        return $this->generatePdf('laporan.pdf-summary', [
            'dataTamu' => $dataTamu,
            'reportTitle' => 'Laporan Custom',
            'periodLabel' => $tahun,
            'summary' => $this->pdfSummary($dataTamu),
            'summaryTable' => $this->prepareCustomSummary($dataTamu),
        ], "laporan-custom-{$tahun}.pdf", 'landscape');
    }

    private function pdfSummary($dataTamu)
    {
        $totalOrang = 0;
        foreach ($dataTamu as $tamu) {
            $totalOrang += $tamu->anda_sendirian === 'Rombongan' ? ($tamu->jumlah_rombongan ?? 0) : 1;
        }

        return [
            'totalKunjungan' => $dataTamu->count(),
            'totalOrang' => $totalOrang,
            'totalLakiLaki' => $dataTamu->where('jenis_kelamin', 'Laki-laki')->count(),
            'totalPerempuan' => $dataTamu->where('jenis_kelamin', 'Perempuan')->count(),
        ];
    }

    private function prepareCustomSummary($dataTamu)
    {
        $categories = [
            'Penelitian atau Mencari Arsip' => ['Penelitian atau Mencari Arsip'],
            'Kunjungan atau Wisata Arsip' => ['Kunjungan atau Wisata Arsip'],
            'Magang atau PKL' => ['Magang atau PKL'],
            'Konsultasi Kearsipan atau Perpustakaan' => ['Konsultasi Kearsipan atau Perpustakaan'],
            'Umum atau Lain - Lain' => ['Umum atau Lain - Lain'],
        ];

        $summary = [];
        foreach ($categories as $label => $values) {
            for ($month = 1; $month <= 12; $month++) {
                $summary[$label][$month] = ['kl' => 0, 'org' => 0];
            }
        }

        foreach ($dataTamu as $tamu) {
            $month = $tamu->created_at->month;
            $count = $tamu->anda_sendirian === 'Rombongan' ? ($tamu->jumlah_rombongan ?? 0) : 1;
            $categoryKey = 'Umum atau Lain - Lain';

            foreach ($categories as $label => $values) {
                if (in_array($tamu->keperluan, $values, true)) {
                    $categoryKey = $label;
                    break;
                }
            }

            $summary[$categoryKey][$month]['kl'] += 1;
            $summary[$categoryKey][$month]['org'] += $count;
        }

        $totals = [];
        for ($month = 1; $month <= 12; $month++) {
            $totals[$month] = ['kl' => 0, 'org' => 0];
            foreach ($summary as $categoryData) {
                $totals[$month]['kl'] += $categoryData[$month]['kl'];
                $totals[$month]['org'] += $categoryData[$month]['org'];
            }
        }

        return ['categories' => $categories, 'summary' => $summary, 'totals' => $totals];
    }

    private function generatePdf(string $view, array $data, string $filename, string $orientation = 'portrait')
    {
        $pdf = Pdf::loadView($view, $data)->setPaper('a4', $orientation);

        return $pdf->stream($filename);
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