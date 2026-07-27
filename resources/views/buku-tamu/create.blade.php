<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <link rel="icon" type="image/png" href="{{ asset('favicon.png') }}">
    <title>Panel Buku Tamu - Dinas Arpus Jateng</title>
    @vite(['resources/css/app.css', 'resources/js/keyboard.js', 'resources/js/page-transition.js'])
</head>
<body class="relative min-h-screen">
    <!-- Tombol Back -->
    <a href="{{ route('welcome') }}"
       class="fixed top-8 left-4 z-50 flex items-center gap-2 bg-white/90 hover:bg-white text-gray-900 font-semibold text-sm px-4 py-2 rounded-lg shadow-lg transition">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
        </svg>
        Kembali
    </a>

    <!-- Foto background -->
    <img src="{{ asset('images/darpus.jpg') }}" alt="Gedung Arpus" class="fixed inset-0 w-full h-full object-cover -z-10">
    <div class="fixed inset-0 bg-black/60 -z-10"></div>

    <!-- Teks berjalan -->
    <div class="bg-yellow-500 text-gray-900 font-semibold text-sm py-1 overflow-hidden whitespace-nowrap">
        <div class="animate-marquee inline-block">
            Selamat Datang di Dinas Kearsipan dan Perpustakaan Provinsi Jawa Tengah — Mohon isi Buku Tamu Elektronik dengan data yang benar
        </div>
    </div>

    <div class="flex items-center justify-center px-4 py-8">
        <div class="bg-white/95 backdrop-blur rounded-2xl shadow-2xl p-6 md:p-8 w-full max-w-3xl">

            <h1 class="text-center text-2xl md:text-3xl font-extrabold text-gray-900 mb-6">
                BUKU TAMU ELEKTRONIK
            </h1>

            <form action="{{ route('buku-tamu.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
                @csrf

               <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <!-- IDENTITAS -->
                <div>
                    <label class="block text-xs font-semibold text-gray-600 mb-1">
                        IDENTITAS <span class="font-normal italic text-gray-600">(Wajib Diisi)</span>
                    </label>
                    <input type="text" name="identitas" required placeholder="Kartu Tanda Penduduk / SIM / Kartu Pelajar"
                           class="kiosk-input w-full border border-gray-300 rounded-lg px-3 py-4 text-sm focus:outline-none focus:ring-2 focus:ring-yellow-500">
                </div>

                <!-- NOMOR HP -->
                <div>
                    <label class="block text-xs font-semibold text-gray-600 mb-1">
                        NOMOR HP <span class="font-normal italic text-gray-600">(Data akan kami jaga kerahasiaannya)</span>
                    </label>
                    <input type="text" name="no_hp" placeholder="Nomor yang bisa dihubungi"
                           class="kiosk-input w-full border border-gray-300 rounded-lg px-3 py-4 text-sm focus:outline-none focus:ring-2 focus:ring-yellow-500">
                </div>

                <!-- INSTANSI / ALAMAT -->
                <div>
                    <label class="block text-xs font-semibold text-gray-600 mb-1">
                        INSTANSI / ALAMAT <span class="font-normal italic text-gray-600">(Wajib Diisi)</span>
                    </label>
                    <input type="text" name="instansi_alamat" required placeholder="Instansi anda bekerja / Alamat anda"
                           class="kiosk-input w-full border border-gray-300 rounded-lg px-3 py-4 text-sm focus:outline-none focus:ring-2 focus:ring-yellow-500">
                </div>

                <!-- KEPERLUAN -->
                <div>
                    <label class="block text-xs font-semibold text-gray-600 mb-1">
                        KEPERLUAN <span class="font-normal italic text-gray-600">(Wajib Diisi)</span>
                    </label>
                    <select name="keperluan" required
        class="w-full rounded-lg px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-green-500">
    <option value="">-- Pilih --</option>
    @foreach ($keperluans as $item)
        <option value="{{ $item->nama }}">{{ $item->nama }}</option>
    @endforeach
</select>
                </div>

                <!-- NAMA -->
                <div>
                    <label class="block text-xs font-semibold text-gray-600 mb-1">
                        NAMA <span class="font-normal italic text-gray-600">(Wajib Diisi)</span>
                    </label>
                    <input type="text" name="nama" required placeholder="Nama Lengkap Anda"
                           class="kiosk-input w-full border border-gray-300 rounded-lg px-3 py-4 text-sm focus:outline-none focus:ring-2 focus:ring-yellow-500">
                </div>

                <!-- PEGAWAI YANG INGIN DITEMUI -->
                <div>
                    <label class="block text-xs font-semibold text-gray-600 mb-1">
                        PEGAWAI YANG INGIN ANDA TEMUI ?
                    </label>
                    <input type="text" name="pegawai_temui" placeholder="Boleh tidak diisi"
                           class="kiosk-input w-full border border-gray-300 rounded-lg px-3 py-4 text-sm focus:outline-none focus:ring-2 focus:ring-yellow-500">
                </div>

                <!-- JENIS KELAMIN -->
                <div>
                    <label class="block text-xs font-semibold text-gray-600 mb-1">
                        JENIS KELAMIN <span class="font-normal italic text-gray-600">(Wajib Diisi)</span>
                    </label>
                    <div class="flex flex-col gap-2 text-black text-sm">
                        <label class="flex items-center gap-2">
                            <input type="radio" name="jenis_kelamin" value="Laki-laki" required class="accent-green-500 ">
                            LAKI - LAKI
                        </label>
                        <label class="flex items-center gap-2">
                            <input type="radio" name="jenis_kelamin" value="Perempuan" required class="accent-green-500">
                            PEREMPUAN
                        </label>
                    </div>
                </div>

                <!-- ANDA SENDIRIAN -->
                <div>
                    <label class="block text-xs font-semibold text-gray-600 mb-1">
                        ANDA SENDIRIAN ? <span class="font-normal italic text-gray-600">(Wajib Diisi)</span>
                    </label>
                    <select name="anda_sendirian" id="anda_sendirian" required
                            class="kiosk-input w-full border border-gray-300 rounded-lg px-3 py-4 text-sm focus:outline-none focus:ring-2 focus:ring-yellow-500">
                        <option value="Hanya saya">Hanya saya</option>
                        <option value="Rombongan">Rombongan ( Lebih dari 1 orang )</option>
                    </select>
                </div>

                <!-- USIA -->
                <div>
                    <label class="block text-xs font-semibold text-gray-600 mb-1">
                        USIA <span class="font-normal italic text-gray-300">(Wajib Diisi)</span>
                    </label>
                    <input type="number" name="usia" required min="1" placeholder="Usia Anda"
                           class="kiosk-input w-full border border-gray-300 rounded-lg px-3 py-4 text-sm focus:outline-none focus:ring-2 focus:ring-yellow-500">
                </div>

                <!-- SEBUTKAN JUMLAHNYA (muncul kalau Rombongan) -->
                <div id="jumlah_rombongan_wrapper" class="hidden">
                    <label class="block text-xs font-semibold text-gray-600 mb-1">
                        SEBUTKAN JUMLAHNYA ? (Orang) <span class="font-normal italic text-gray-600">(Wajib Diisi)</span>
                    </label>
                    <input type="number" name="jumlah_rombongan" id="jumlah_rombongan" min="2" placeholder="5"
                           class="kiosk-input w-full border border-gray-300 rounded-lg px-3 py-4 text-sm focus:outline-none focus:ring-2 focus:ring-yellow-500">
                </div>

            </div>

            <button type="submit"
                    class="w-full bg-yellow-500 hover:bg-yellow-600 text-gray-900 font-bold py-3 rounded-lg transition">
                Simpan
            </button>

        </form>

            <!-- Keyboard virtual -->
            <div class="simple-keyboard mt-6"></div>
            

        </div>
        
    </div>
 @include('partials.footer')
</body>
</html>