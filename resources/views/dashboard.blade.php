<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800">
            Dashboard Buku Tamu
        </h2>
    </x-slot>

    <div class="p-8 space-y-6">

        <!-- Kartu Statistik -->
        <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
            <div class="bg-white rounded-xl border border-gray-200 p-5">
                <p class="text-sm text-gray-500">Total Tamu</p>
                <p class="text-3xl font-bold text-gray-900 mt-1">{{ $totalTamu }}</p>
            </div>
            <div class="bg-white rounded-xl border border-gray-200 p-5">
                <p class="text-sm text-gray-500">Tamu Hari Ini</p>
                <p class="text-3xl font-bold text-yellow-600 mt-1">{{ $tamuHariIni }}</p>
            </div>
            <div class="bg-white rounded-xl border border-gray-200 p-5">
                <p class="text-sm text-gray-500">Tamu Bulan Ini</p>
                <p class="text-3xl font-bold text-gray-900 mt-1">{{ $tamuBulanIni }}</p>
            </div>
            <div class="bg-white rounded-xl border border-gray-200 p-5">
                <p class="text-sm text-gray-500">Laki-laki / Perempuan</p>
                <p class="text-2xl font-bold text-gray-900 mt-1">{{ $totalLakiLaki }} / {{ $totalPerempuan }}</p>
            </div>
        </div>

        <!-- Grafik -->
        <div class="bg-white rounded-xl border border-gray-200 p-6">
            <h3 class="font-semibold text-gray-800 mb-4">Kunjungan 7 Hari Terakhir</h3>
            <canvas id="grafikKunjungan" height="80"></canvas>
        </div>

        <!-- Tabel Data -->
        <div class="bg-white rounded-xl border border-gray-200 overflow-x-auto">
            <table class="min-w-full text-sm text-left">
                <thead class="bg-gray-50 text-gray-500 uppercase text-xs border-b border-gray-200">
                    <tr>
                        <th class="px-4 py-3">Nama</th>
                        <th class="px-4 py-3">Identitas</th>
                        <th class="px-4 py-3">No HP</th>
                        <th class="px-4 py-3">Instansi/Alamat</th>
                        <th class="px-4 py-3">Keperluan</th>
                        <th class="px-4 py-3">Jenis Kelamin</th>
                        <th class="px-4 py-3">Usia</th>
                        <th class="px-4 py-3">Waktu</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @forelse ($dataTamu as $tamu)
                        <tr class="hover:bg-yellow-50/50">
                            <td class="px-4 py-3 font-medium text-gray-900">{{ $tamu->nama }}</td>
                            <td class="px-4 py-3 text-gray-600">{{ $tamu->identitas }}</td>
                            <td class="px-4 py-3 text-gray-600">{{ $tamu->no_hp ?? '-' }}</td>
                            <td class="px-4 py-3 text-gray-600">{{ $tamu->instansi_alamat }}</td>
                            <td class="px-4 py-3 text-gray-600">{{ $tamu->keperluan }}</td>
                            <td class="px-4 py-3 text-gray-600">{{ $tamu->jenis_kelamin }}</td>
                            <td class="px-4 py-3 text-gray-600">{{ $tamu->usia }}</td>
                            <td class="px-4 py-3 text-gray-500">{{ $tamu->created_at->format('d M Y, H:i') }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="px-4 py-6 text-center text-gray-400">Belum ada data tamu.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div>
            {{ $dataTamu->links() }}
        </div>

    </div>

    <script>
        window.grafikTanggal = @json($grafikTanggal);
        window.grafikJumlah = @json($grafikJumlah);
    </script>

    @vite('resources/js/dashboard-chart.js')
</x-app-layout>