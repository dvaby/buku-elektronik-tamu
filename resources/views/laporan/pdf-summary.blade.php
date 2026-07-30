<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $reportTitle }}</title>
    <style>
        body { font-family: DejaVu Sans, sans-serif; color: #333; margin: 0; padding: 0; }
        .page { width: 100%; margin: 0 auto; padding: 16px; }
        .heading { text-align: center; margin-bottom: 12px; }
        .heading h1 { font-size: 18px; margin: 0; }
        .heading p { margin: 2px 0; font-size: 12px; }
        .info { margin-bottom: 14px; font-size: 11px; }
        .info .left, .info .right { display: inline-block; vertical-align: top; }
        .info .left { width: 55%; }
        .info .right { width: 43%; text-align: right; }
        table { width: 100%; border-collapse: collapse; font-size: 9.5px; }
        table thead th, table tbody td { border: 1px solid #333; padding: 6px 4px; }
        table thead th { background: #f5f5f5; }
        .month-cell { line-height: 1.2; }
        .month-cell span { display: block; }
        .footer { margin-top: 18px; font-size: 11px; }
        .footer .signature { width: 250px; float: right; text-align: center; }
        .bottom-summary { margin-top: 16px; font-size: 11px; }
        .bottom-summary .box { display: inline-block; width: 24%; padding: 8px; border: 1px solid #333; background: #f6f6f6; box-sizing: border-box; margin-right: 4px; }
        .bottom-summary .box:last-child { margin-right: 0; }
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
                <strong>Total Kunjungan:</strong> {{ $summary['totalKunjungan'] }}<br>
                <strong>Total Orang:</strong> {{ $summary['totalOrang'] }}<br>
                <strong>Laki-laki:</strong> {{ $summary['totalLakiLaki'] }}<br>
                <strong>Perempuan:</strong> {{ $summary['totalPerempuan'] }}
            </div>
        </div>

        <table>
            <thead>
                <tr>
                    <th rowspan="2">No</th>
                    <th rowspan="2">Kegiatan</th>
                    <th colspan="12">Bulan</th>
                    <th colspan="2">Jumlah</th>
                </tr>
                <tr>
                    @foreach (['Jan','Feb','Mar','Apr','Mei','Jun','Jul','Agt','Sep','Okt','Nov','Des'] as $month)
                        <th>{{ $month }}</th>
                    @endforeach
                    <th>KL</th>
                    <th>Org</th>
                </tr>
            </thead>
            <tbody>
                @php $row = 1; @endphp
                @foreach ($summaryTable['summary'] as $category => $months)
                    <tr>
                        <td>{{ $row++ }}</td>
                        <td>{{ $category }}</td>
                        @php $rowTotalKl = 0; $rowTotalOrg = 0; @endphp
                        @foreach ($months as $month => $values)
                            @php $rowTotalKl += $values['kl']; $rowTotalOrg += $values['org']; @endphp
                            <td class="month-cell"><span>{{ $values['kl'] }} KL</span><span>{{ $values['org'] }} Org</span></td>
                        @endforeach
                        <td>{{ $rowTotalKl }}</td>
                        <td>{{ $rowTotalOrg }}</td>
                    </tr>
                @endforeach
                <tr>
                    <td colspan="2"><strong>Jumlah Total</strong></td>
                    @foreach ($summaryTable['totals'] as $month => $values)
                        <td class="month-cell"><span><strong>{{ $values['kl'] }}</strong> KL</span><span><strong>{{ $values['org'] }}</strong> Org</span></td>
                    @endforeach
                    @php
                        $totalKl = collect($summaryTable['totals'])->sum(fn($value) => $value['kl']);
                        $totalOrg = collect($summaryTable['totals'])->sum(fn($value) => $value['org']);
                    @endphp
                    <td><strong>{{ $totalKl }}</strong></td>
                    <td><strong>{{ $totalOrg }}</strong></td>
                </tr>
            </tbody>
        </table>

        <div class="bottom-summary">
            <div class="box"><strong>Total Kunjungan</strong><br>{{ $summary['totalKunjungan'] }} Kali</div>
            <div class="box"><strong>Total Orang</strong><br>{{ $summary['totalOrang'] }} Orang</div>
            <div class="box"><strong>Laki-Laki</strong><br>{{ $summary['totalLakiLaki'] }} Orang</div>
            <div class="box"><strong>Perempuan</strong><br>{{ $summary['totalPerempuan'] }} Orang</div>
        </div>

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
