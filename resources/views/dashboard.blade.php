<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800">
            Dashboard
        </h2>
    </x-slot>

    <div class="p-8 space-y-6">

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

            <!-- Grafik per Bulan -->
            <div class="bg-white rounded-xl border border-gray-200 overflow-hidden">
                <div class="bg-yellow-500 px-4 py-3">
                    <h3 class="font-semibold text-gray-900 text-sm">Pengunjung Berdasarkan Bulan</h3>
                </div>
                <div class="p-4">
                    <select id="filterTahunBulan" class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm mb-4 focus:outline-none focus:ring-2 focus:ring-yellow-500">
                        @foreach ($tahunTersedia as $t)
                            <option value="{{ $t }}" {{ $t == $tahunSekarang ? 'selected' : '' }}>{{ $t }}</option>
                        @endforeach
                    </select>
                    <canvas id="chartBulan" height="220"></canvas>
                </div>
            </div>

            <!-- Grafik per Tanggal -->
            <div class="bg-white rounded-xl border border-gray-200 overflow-hidden">
                <div class="bg-yellow-500 px-4 py-3">
                    <h3 class="font-semibold text-gray-900 text-sm">Pengunjung Berdasarkan Tanggal</h3>
                </div>
                <div class="p-4">
                    <div class="flex gap-2 mb-4">
                        <select id="filterTahunTanggal" class="w-1/2 border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-yellow-500">
                            @foreach ($tahunTersedia as $t)
                                <option value="{{ $t }}" {{ $t == $tahunSekarang ? 'selected' : '' }}>{{ $t }}</option>
                            @endforeach
                        </select>
                        <select id="filterBulanTanggal" class="w-1/2 border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-yellow-500">
                            @foreach (['Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember'] as $i => $nama)
                                <option value="{{ $i + 1 }}" {{ ($i + 1) == $bulanSekarang ? 'selected' : '' }}>{{ $nama }}</option>
                            @endforeach
                        </select>
                    </div>
                    <canvas id="chartTanggal" height="220"></canvas>
                </div>
            </div>

            <!-- Grafik per Keperluan -->
            <div class="bg-white rounded-xl border border-gray-200 overflow-hidden">
                <div class="bg-yellow-500 px-4 py-3">
                    <h3 class="font-semibold text-gray-900 text-sm">Pengunjung Berdasarkan Keperluan</h3>
                </div>
                <div class="p-4">
                    <div class="flex gap-2 mb-4">
                        <select id="filterTahunKeperluan" class="w-1/2 border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-yellow-500">
                            @foreach ($tahunTersedia as $t)
                                <option value="{{ $t }}" {{ $t == $tahunSekarang ? 'selected' : '' }}>{{ $t }}</option>
                            @endforeach
                        </select>
                        <select id="filterBulanKeperluan" class="w-1/2 border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-yellow-500">
                            <option value="">Semua Bulan</option>
                            @foreach (['Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember'] as $i => $nama)
                                <option value="{{ $i + 1 }}" {{ ($i + 1) == $bulanSekarang ? 'selected' : '' }}>{{ $nama }}</option>
                            @endforeach
                        </select>
                    </div>
                    <canvas id="chartKeperluan" height="220"></canvas>
                </div>
            </div>

        </div>

        <div class="bg-white rounded-xl border border-gray-200 overflow-hidden">
            <div class="bg-yellow-500 px-4 py-3 flex items-center justify-between">
                <h3 class="font-semibold text-gray-900 text-sm">Feedback Terbaru</h3>
                <span class="text-xs text-gray-700">{{ $feedbacks->count() }} entri terbaru</span>
            </div>
            <div class="p-4 space-y-4">
                @forelse ($feedbacks as $feedback)
                    <div class="border border-gray-200 rounded-lg p-4 bg-gray-50">
                        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-3">
                            <div>
                                <p class="font-semibold text-gray-900">{{ $feedback->bukuTamu->nama ?? 'Pengunjung' }}</p>
                                <p class="text-sm text-gray-600">{{ $feedback->feedback ?: 'Tidak ada komentar.' }}</p>
                            </div>
                            <div class="text-sm text-gray-600">
                                <div class="flex items-center gap-1">
                                    @for ($i = 1; $i <= 5; $i++)
                                        <span class="{{ $i <= ($feedback->rating ?? 0) ? 'text-yellow-500' : 'text-gray-300' }}">★</span>
                                    @endfor
                                </div>
                                <p class="mt-1">Status: <span class="font-medium text-gray-800">{{ ucfirst($feedback->status ?? 'baru') }}</span></p>
                                <p class="mt-1 text-xs text-gray-500">{{ optional($feedback->created_at)->format('d M Y') }}</p>
                            </div>
                        </div>
                    </div>
                @empty
                    <p class="text-sm text-gray-600">Belum ada feedback.</p>
                @endforelse

                <div class="flex justify-end">
                    <a href="{{ route('dashboard.feedback.index') }}" class="text-sm font-semibold text-yellow-600 hover:text-yellow-700">
                        Lihat semua feedback
                    </a>
                </div>
            </div>
        </div>

    </div>

    <script>
        window.dashboardUrls = {
            chartBulan: "{{ route('dashboard.chart-bulan') }}",
            chartTanggal: "{{ route('dashboard.chart-tanggal') }}",
            chartKeperluan: "{{ route('dashboard.chart-keperluan') }}",
        };
    </script>

</x-app-layout>          