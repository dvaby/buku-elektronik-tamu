<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $reportTitle }}</title>
    <style>
        body { font-family: DejaVu Sans, sans-serif; color: #333; margin: 0; padding: 0; }
        .page { width: 100%; margin: 0 auto; padding: 16px; }
        .heading { text-align: center; margin-bottom: 16px; }
        .heading h1 { font-size: 18px; margin: 0; }
        .heading p { margin: 3px 0; font-size: 12px; }
        .info { margin: 16px 0; font-size: 11px; }
        .info .left, .info .right { display: inline-block; vertical-align: top; }
        .info .left { width: 55%; }
        .info .right { width: 43%; text-align: right; }
        table { width: 100%; border-collapse: collapse; font-size: 10px; }
        table thead th { border: 1px solid #333; padding: 7px 5px; background: #f5f5f5; }
        table tbody td { border: 1px solid #333; padding: 6px 5px; vertical-align: top; }
        .footer { margin-top: 20px; font-size: 11px; }
        .footer .signature { width: 250px; float: right; text-align: center; }
        .no-data { text-align: center; margin: 24px 0; font-size: 11px; }
    </style>
</head>
<body>
    <div class="page">
        <div class="heading">
            <h1>DATA LAYANAN</h1>
            <p>DINAS KEARSIPAN DAN PERPUSTAKAAN PROV. JATENG</p>
            <p>{{ $reportTitle }} - {{ $periodLabel }}</p>
        </div>

        <div class="info">
            <div class="left">
                <strong>Periode:</strong> {{ $periodLabel }}<br>
                <strong>Tanggal Cetak:</strong> {{ now()->format('d F Y') }}
            </div>
            <div class="right">
                <strong>Total Data:</strong> {{ $summary['totalKunjungan'] }}<br>
                <strong>Total Orang:</strong> {{ $summary['totalOrang'] }}<br>
                <strong>Laki-laki:</strong> {{ $summary['totalLakiLaki'] }}<br>
                <strong>Perempuan:</strong> {{ $summary['totalPerempuan'] }}
            </div>
        </div>

        @if ($dataTamu->isEmpty())
            <div class="no-data">Tidak ada data pengunjung pada periode ini.</div>
        @else
            <table>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Tanggal</th>
                        <th>Waktu</th>
                        <th>Kegiatan</th>
                        <th>Asal</th>
                        <th>Menemui</th>
                        <th>Usia</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($dataTamu as $index => $tamu)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $tamu->created_at->format('d F Y') }}</td>
                            <td>{{ $tamu->created_at->format('H:i:s') }}</td>
                            <td>{{ $tamu->keperluan }}</td>
                            <td>{{ $tamu->instansi_alamat }}</td>
                            <td>{{ $tamu->pegawai_temui ?? '-' }}</td>
                            <td>{{ $tamu->usia ?? '-' }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif

        <div class="footer">
            <div class="signature">
                <p>Semarang, {{ now()->format('d F Y') }}</p>
                <p>KETUA POKJA LAYANAN ARSIP</p>
                <br><br><br>
                <p style="text-decoration: underline;">IMAM SANYOTO, SE, MM</p>
                <p>NIP. 19731123 200604 1 003</p>
            </div>
        </div>
    </div>
</body>
</html>
