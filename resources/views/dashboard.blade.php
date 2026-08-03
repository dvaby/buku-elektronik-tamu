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
                <span class="text-xs text-gray-700">{{ $feedbacks->count() }} entri</span>
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
                            </div>
                        </div>

                        <form action="{{ route('dashboard.feedback.update', $feedback) }}" method="POST" class="mt-4 space-y-3">
                            @csrf
                            @method('PUT')
                            <div class="grid md:grid-cols-3 gap-3">
                                <label class="text-sm text-gray-700">
                                    <span class="block mb-1">Rating</span>
                                    <select name="rating" class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-yellow-500">
                                        @for ($i = 1; $i <= 5; $i++)
                                            <option value="{{ $i }}" {{ ($feedback->rating ?? 0) == $i ? 'selected' : '' }}>{{ $i }} Bintang</option>
                                        @endfor
                                    </select>
                                </label>
                                <label class="text-sm text-gray-700">
                                    <span class="block mb-1">Status</span>
                                    <select name="status" class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-yellow-500">
                                        @foreach (['baru', 'diproses', 'selesai'] as $status)
                                            <option value="{{ $status }}" {{ ($feedback->status ?? 'baru') == $status ? 'selected' : '' }}>{{ ucfirst($status) }}</option>
                                        @endforeach
                                    </select>
                                </label>
                                <label class="text-sm text-gray-700 md:col-span-1">
                                    <span class="block mb-1">Tanggal</span>
                                    <input type="text" value="{{ optional($feedback->created_at)->format('d M Y') }}" class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm bg-gray-100" disabled>
                                </label>
                            </div>
                            <label class="block text-sm text-gray-700">
                                <span class="block mb-1">Komentar</span>
                                <textarea name="feedback" rows="3" class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-yellow-500">{{ old('feedback', $feedback->feedback) }}</textarea>
                            </label>
                            <div class="flex justify-end gap-2">
                                <button type="submit" class="bg-yellow-500 hover:bg-yellow-600 text-gray-900 font-semibold px-4 py-2 rounded-lg">Simpan</button>
                                <form action="{{ route('dashboard.feedback.destroy', $feedback) }}" method="POST" onsubmit="return confirm('Hapus feedback ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-500 hover:bg-red-600 text-white font-semibold px-4 py-2 rounded-lg">Hapus</button>
                                </form>
                            </div>
                        </form>
                    </div>
                @empty
                    <p class="text-sm text-gray-600">Belum ada feedback.</p>
                @endforelse
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

    @vite('resources/js/dashboard-chart.js')
</x-app-layout>          