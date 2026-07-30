<!DOCTYPE html>
<html lang="id">
<<<<<<< HEAD

=======
>>>>>>> DAVINBARU
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
<<<<<<< HEAD
    <title>Buku Tamu Elektronik</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap"
        rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
        }

        @keyframes marquee {
            0% { transform: translateX(100%); }
            100% { transform: translateX(-100%); }
        }

        .marquee-wrap { overflow: hidden; }

        .marquee-text {
            display: inline-block;
            white-space: nowrap;
            animation: marquee 28s linear infinite;
            cursor: pointer;
        }

        .marquee-wrap:hover .marquee-text {
            animation-play-state: paused;
        }

        @keyframes bg-zoom { from { transform: scale(1.12); } to { transform: scale(1); } }
        @keyframes card-enter { from { opacity: 0; transform: translateY(30px) scale(.97); } to { opacity: 1; transform: translateY(0) scale(1); } }
        @keyframes bar-enter { from { opacity: 0; transform: translateY(-16px); } to { opacity: 1; transform: translateY(0); } }
        @keyframes fade-up { from { opacity: 0; transform: translateY(18px); } to { opacity: 1; transform: translateY(0); } }
        @keyframes footer-enter { from { opacity: 0; transform: translateY(16px); } to { opacity: 1; transform: translateY(0); } }

        .bg-enter { animation: bg-zoom 1.4s cubic-bezier(.16, 1, .3, 1) forwards; }
        .card-enter { opacity: 0; animation: card-enter .8s cubic-bezier(.16, 1, .3, 1) forwards; animation-delay: .1s; }
        .bar-enter { opacity: 0; animation: bar-enter .6s cubic-bezier(.16, 1, .3, 1) forwards; animation-delay: .35s; }
        .title-enter { opacity: 0; animation: fade-up .6s cubic-bezier(.16, 1, .3, 1) forwards; animation-delay: .5s; }
        .field-enter { opacity: 0; animation: fade-up .55s cubic-bezier(.16, 1, .3, 1) forwards; }
        .btn-enter { opacity: 0; animation: fade-up .55s cubic-bezier(.16, 1, .3, 1) forwards; }
        .footer-enter { opacity: 0; animation: footer-enter .6s cubic-bezier(.16, 1, .3, 1) forwards; animation-delay: .9s; }

        @media (prefers-reduced-motion: reduce) {
            .bg-enter, .card-enter, .bar-enter, .title-enter, .field-enter, .btn-enter, .footer-enter {
                animation: none !important;
                opacity: 1 !important;
                transform: none !important;
            }
        }

        #customKeyboard {
            font-family: 'Plus Jakarta Sans', sans-serif;
        }
=======
    <link rel="icon" type="image/png" href="{{ asset('favicon.png') }}">
    <title>Buku Tamu Elektronik - Dinas Arpus Jateng</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }

        @keyframes marquee {
            0%   { transform: translateX(100%); }
            100% { transform: translateX(-100%); }
        }
        .animate-marquee {
            display: inline-block;
            animation: marquee 22s linear infinite;
        }

        #customKeyboard { font-family: 'Plus Jakarta Sans', sans-serif; }
>>>>>>> DAVINBARU
        #customKeyboard .kb-key {
            background: #27272a;
            border: 1px solid #3f3f46;
            color: #f4f4f5;
            font-weight: 600;
            font-size: 0.9rem;
            border-radius: 6px;
            transition: all 0.08s ease;
            user-select: none;
            display: flex;
            align-items: center;
            justify-content: center;
        }
<<<<<<< HEAD
        #customKeyboard .kb-key:hover {
            background: #3f3f46;
            border-color: #52525b;
        }
=======
        #customKeyboard .kb-key:hover { background: #3f3f46; border-color: #52525b; }
>>>>>>> DAVINBARU
        #customKeyboard .kb-key:active,
        #customKeyboard .kb-key.kb-pressed {
            background: #facc15;
            color: #18181b;
            border-color: #eab308;
            transform: scale(0.96);
        }
        #customKeyboard .kb-key-enter {
            background: #eab308;
            color: #18181b;
            border-color: #ca8a04;
            font-weight: 700;
        }
<<<<<<< HEAD
        #customKeyboard .kb-key-enter:hover {
            background: #facc15;
        }
        #customKeyboard .kb-key-bksp,
        #customKeyboard .kb-key-shift {
            background: #3f3f46;
            color: #f4f4f5;
        }
    </style>
</head>

<body class="min-h-screen relative overflow-x-hidden flex flex-col">

    
    <div class="fixed inset-0 -z-10 overflow-hidden">
        <img src="{{ asset('images/gedung-arpus.PNG') }}"
            alt="Gedung Dinas Kearsipan dan Perpustakaan Provinsi Jawa Tengah"
            class="bg-enter w-full h-full object-cover">
        <div class="absolute inset-0"></div>
    </div>

   
    <div class="footer-enter w-full bg-black/40 backdrop-blur-sm px-6 py-3
            flex items-center text-white/80 text-sm">
        <a href="{{ url('/bukutamu') }}" class="flex items-center gap-2 hover:text-yellow-400 transition-colors">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
            </svg>
            Kembali
        </a>
    </div>

    <main id="mainContent" class="flex-1 w-full flex flex-col items-center justify-center px-4 py-4 md:py-6 pb-16 transition-all duration-300">

       
        <div id="formCard"
            class="card-enter w-full max-w-3xl bg-white/95 backdrop-blur rounded-2xl shadow-2xl border border-white/40 overflow-hidden transition-transform duration-300 ease-out">

            <div class="bar-enter bg-yellow-500 text-[#1E3A5F] font-extrabold text-lg md:text-xl py-2.5 marquee-wrap">
                <span class="marquee-text text-base md:text-sm">
                    Selamat Datang di Dinas Kearsipan dan Perpustakaan Provinsi Jawa Tengah &nbsp;&mdash;&nbsp; Data
                    Anda akan kami jaga kerahasiaannya.
                </span>
            </div>

            <div class="p-5 md:p-8">

                <h1
                    class="title-enter text-center text-lg md:text-xl font-extrabold text-[#1E3A5F] mb-4 md:mb-6 tracking-wide">
                    BUKU TAMU ELEKTRONIK
                </h1>

                <div id="errorBox"
                    class="hidden mb-4 bg-red-50 border border-red-200 text-red-700 text-sm rounded-xl p-3">
                    <ul id="errorList" class="list-disc list-inside space-y-1"></ul>
                </div>

                <form id="guestForm" class="space-y-3.5">

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-x-5 gap-y-3.5">

                      
                        <div class="space-y-3.5">

                            <div class="field-enter" style="animation-delay:.55s">
                                <label class="block text-xs font-bold text-[#1E3A5F] mb-1 tracking-wide">
                                    IDENTITAS <span class="font-normal text-red-500 italic">(wajib diisi)</span>
                                </label>
                                <input type="text" name="identitas" inputmode="none"
                                    placeholder="Kartu Tanda Penduduk / SIM / Kartu Pelajar" class="kb-input w-full border border-slate-300 rounded-lg px-3 py-2 text-sm
                    focus:outline-none focus:ring-2 focus:ring-yellow-400 focus:border-yellow-400">
                            </div>

                            <div class="field-enter" style="animation-delay:.6s">
                                <label class="block text-xs font-bold text-[#1E3A5F] mb-1 tracking-wide">
                                    INSTANSI / ALAMAT <span class="font-normal text-red-500 italic">(Wajib Diisi)</span>
                                </label>
                                <input type="text" name="instansi" required inputmode="none"
                                    placeholder="Instansi anda bekerja / Alamat anda" class="kb-input w-full border border-slate-300 rounded-lg px-3 py-2 text-sm
                    focus:outline-none focus:ring-2 focus:ring-yellow-400 focus:border-yellow-400">
                            </div>

                            <div class="field-enter" style="animation-delay:.65s">
                                <label class="block text-xs font-bold text-[#1E3A5F] mb-1 tracking-wide">
                                    NAMA <span class="font-normal text-red-500 italic">(Wajib Diisi)</span>
                                </label>
                                <input type="text" name="nama" required inputmode="none" placeholder="Nama Lengkap Anda" class="kb-input w-full border border-slate-300 rounded-lg px-3 py-2 text-sm
                    focus:outline-none focus:ring-2 focus:ring-yellow-400 focus:border-yellow-400">
                            </div>

                            <div class="field-enter" style="animation-delay:.7s">
                                <label class="block text-xs font-bold text-[#1E3A5F] mb-1 tracking-wide">
                                    JENIS KELAMIN <span class="font-normal text-red-500 italic">(Wajib Diisi)</span>
                                </label>
                                <select name="jenis_kelamin" required class="w-full border border-slate-300 rounded-lg px-3 py-2 text-sm bg-white
                    focus:outline-none focus:ring-2 focus:ring-yellow-400 focus:border-yellow-400">
                                    <option value="" selected disabled>--Pilih--</option>
                                    <option value="Laki-laki">Laki-laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                </select>
                            </div>

                            <div class="field-enter" style="animation-delay:.75s">
                                <label class="block text-xs font-bold text-[#1E3A5F] mb-1 tracking-wide">
                                    USIA <span class="font-normal text-red-500 italic">(Wajib Diisi)</span>
                                </label>
                                <input type="text" name="usia" required inputmode="none" placeholder="Usia Anda" class="kb-input w-full border border-slate-300 rounded-lg px-3 py-2 text-sm
                    focus:outline-none focus:ring-2 focus:ring-yellow-400 focus:border-yellow-400">
                            </div>

                        </div>

                     
                        <div class="space-y-3.5">

                            <div class="field-enter" style="animation-delay:.6s">
                                <label class="block text-xs font-bold text-[#1E3A5F] mb-1 tracking-wide">
                                    NOMOR HP <span class="font-normal text-red-500 italic">(Data akan kami jaga
                                        kerahasiaannya)</span>
                                </label>
                                <input type="text" name="no_hp" inputmode="none" placeholder="Nomor yang bisa dihubungi" class="kb-input w-full border border-slate-300 rounded-lg px-3 py-2 text-sm
                    focus:outline-none focus:ring-2 focus:ring-yellow-400 focus:border-yellow-400">
                            </div>

                            <div class="field-enter" style="animation-delay:.65s">
                                <label class="block text-xs font-bold text-[#1E3A5F] mb-1 tracking-wide">
                                    KEPERLUAN <span class="font-normal text-red-500 italic">(Wajib Diisi)</span>
                                </label>
                                <select name="keperluan" required class="w-full border border-slate-300 rounded-lg px-3 py-2 text-sm bg-white
                    focus:outline-none focus:ring-2 focus:ring-yellow-400 focus:border-yellow-400">
                                    <option value="" selected disabled>--Pilih--</option>
                                    <option value="Peminjaman Arsip">Penelitian atau Peminjaman Arsip</option>
                                    <option value="Kunjungan atau Wisata Arsip">Kunjungan atau Wisata Arsip</option>
                                    <option value="Magang atau Pkl">Magang atau Pkl</option>
                                    <option value="Konsultasi Kearsipan atau Perpustakaan">Konsultasi Kearsipan atau
                                        Perpustakaan</option>
                                    <option value="Umum atau Lain-lain">Umum atau Lain-lain</option>
                                </select>
                            </div>

                            <div class="field-enter" style="animation-delay:.7s">
                                <label class="block text-xs font-bold text-[#1E3A5F] mb-1 tracking-wide">
                                    PEGAWAI YANG INGIN ANDA TEMUI ?
                                </label>
                                <input type="text" name="pesan" inputmode="none" placeholder="Boleh tidak diisi" class="kb-input w-full border border-slate-300 rounded-lg px-3 py-2 text-sm
                    focus:outline-none focus:ring-2 focus:ring-yellow-400 focus:border-yellow-400">
                            </div>

                            <div class="field-enter" style="animation-delay:.75s">
                                <label class="block text-xs font-bold text-[#1E3A5F] mb-1 tracking-wide">
                                    ANDA SENDIRIAN ?? <span class="font-normal text-red-500 italic">(Wajib Diisi)</span>
                                </label>
                                <select name="sendirian" id="sendirianSelect" required class="w-full border border-slate-300 rounded-lg px-3 py-2 text-sm bg-white
                    focus:outline-none focus:ring-2 focus:ring-yellow-400 focus:border-yellow-400">
                                    <option value="" selected disabled>--Pilih--</option>
                                    <option value="Tidak">Hanya saya</option>
                                    <option value="Ya">Rombongan (Lebih dari 1 orang)</option>
                                </select>
                            </div>

                          
                            <div id="extraFieldWrap" class="hidden">
                                <label class="block text-xs font-bold text-[#1E3A5F] mb-1 tracking-wide">
                                    SEBUTKAN JUMLAHNYA ? (Orang) <span class="font-normal text-slate-400">(Wajib
                                        Diisi)</span>
                                </label>
                                <input type="text" name="catatan_tambahan" inputmode="none" placeholder="Contoh: 3" class="kb-input w-full border border-slate-300 rounded-lg px-3 py-2 text-sm
                    focus:outline-none focus:ring-2 focus:ring-yellow-400 focus:border-yellow-400">
                            </div>

                        </div>
                    </div>

                    <button type="submit" class="btn-enter w-full bg-yellow-400 hover:bg-yellow-500 transition-colors
                               text-[#1E3A5F] font-bold text-sm md:text-base rounded-lg
                               px-5 py-2.5 shadow-md mt-2" style="animation-delay:.85s">
                        Simpan
                    </button>

                </form>

            </div>
        </div>

        <div id="thanksCard"
            class="hidden w-full max-w-3xl bg-white/95 backdrop-blur rounded-2xl shadow-2xl border border-white/40 overflow-hidden p-8 text-center">
            <div class="w-14 h-14 bg-yellow-100 rounded-full flex items-center justify-center mx-auto mb-4">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-7 h-7 text-[#1E3A5F]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                </svg>
            </div>
            <h2 class="text-xl md:text-2xl font-extrabold text-[#1E3A5F] mb-2">Terima Kasih<span id="thanksName"></span>!</h2>
            <p class="text-slate-600 mb-6 text-sm md:text-base">Data kunjungan Anda berhasil dicatat. Selamat berkunjung di Dinas Kearsipan dan Perpustakaan Provinsi Jawa Tengah.</p>
            <button id="backBtn"
                class="inline-block bg-yellow-400 hover:bg-yellow-500 transition-colors text-[#1E3A5F] font-bold px-6 py-2.5 rounded-lg shadow-md text-sm">
                Isi Buku Tamu Lagi
            </button>
        </div>

    </main>

    <div class="footer-enter w-full bg-black/40 backdrop-blur-sm px-6 py-3
            flex items-center justify-between text-white/80 text-xs md:text-sm">
        <span>&copy; {{ date('Y') }} <span class="underline">Dinas Arpus Jateng</span>. All rights reserved.</span>
        <span>Version 3.0</span>
    </div>

=======
        #customKeyboard .kb-key-enter:hover { background: #facc15; }
        #customKeyboard .kb-key-bksp,
        #customKeyboard .kb-key-shift { background: #3f3f46; color: #f4f4f5; }
    </style>
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
        <span class="animate-marquee">
            Selamat Datang di Dinas Kearsipan dan Perpustakaan Provinsi Jawa Tengah — Mohon isi Buku Tamu Elektronik dengan data yang benar
        </span>
    </div>

    <div class="flex items-center justify-center px-4 py-8 pb-40">
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
                        <input type="text" name="identitas" required inputmode="none"
                               placeholder="Kartu Tanda Penduduk / SIM / Kartu Pelajar"
                               class="kb-input w-full border border-gray-300 rounded-lg px-3 py-4 text-sm focus:outline-none focus:ring-2 focus:ring-yellow-500">
                    </div>

                    <!-- NOMOR HP -->
                    <div>
                        <label class="block text-xs font-semibold text-gray-600 mb-1">
                            NOMOR HP <span class="font-normal italic text-gray-600">(Data akan kami jaga kerahasiaannya)</span>
                        </label>
                        <input type="text" name="no_hp" inputmode="none" placeholder="Nomor yang bisa dihubungi"
                               class="kb-input w-full border border-gray-300 rounded-lg px-3 py-4 text-sm focus:outline-none focus:ring-2 focus:ring-yellow-500">
                    </div>

                    <!-- INSTANSI / ALAMAT -->
                    <div>
                        <label class="block text-xs font-semibold text-gray-600 mb-1">
                            INSTANSI / ALAMAT <span class="font-normal italic text-gray-600">(Wajib Diisi)</span>
                        </label>
                        <input type="text" name="instansi_alamat" required inputmode="none"
                               placeholder="Instansi anda bekerja / Alamat anda"
                               class="kb-input w-full border border-gray-300 rounded-lg px-3 py-4 text-sm focus:outline-none focus:ring-2 focus:ring-yellow-500">
                    </div>

                    <!-- KEPERLUAN -->
                    <div>
                        <label class="block text-xs font-semibold text-gray-600 mb-1">
                            KEPERLUAN <span class="font-normal italic text-gray-600">(Wajib Diisi)</span>
                        </label>
                        <select name="keperluan" required
                                class="w-full border border-gray-300 rounded-lg px-4 py-3 text-sm bg-white focus:outline-none focus:ring-2 focus:ring-green-500">
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
                        <input type="text" name="nama" required inputmode="none" placeholder="Nama Lengkap Anda"
                               class="kb-input w-full border border-gray-300 rounded-lg px-3 py-4 text-sm focus:outline-none focus:ring-2 focus:ring-yellow-500">
                    </div>

                    <!-- PEGAWAI YANG INGIN DITEMUI -->
                    <div>
                        <label class="block text-xs font-semibold text-gray-600 mb-1">
                            PEGAWAI YANG INGIN ANDA TEMUI ?
                        </label>
                        <input type="text" name="pegawai_temui" inputmode="none" placeholder="Boleh tidak diisi"
                               class="kb-input w-full border border-gray-300 rounded-lg px-3 py-4 text-sm focus:outline-none focus:ring-2 focus:ring-yellow-500">
                    </div>

                    <!-- JENIS KELAMIN -->
                    <div>
                        <label class="block text-xs font-semibold text-gray-600 mb-1">
                            JENIS KELAMIN <span class="font-normal italic text-gray-600">(Wajib Diisi)</span>
                        </label>
                        <div class="flex flex-col gap-2 text-black text-sm">
                            <label class="flex items-center gap-2">
                                <input type="radio" name="jenis_kelamin" value="Laki-laki" required class="accent-green-500">
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
                                class="w-full border border-gray-300 rounded-lg px-3 py-4 text-sm bg-white focus:outline-none focus:ring-2 focus:ring-yellow-500">
                            <option value="" selected disabled>-- Pilih --</option>
                            <option value="Hanya saya">Hanya saya</option>
                            <option value="Rombongan">Rombongan ( Lebih dari 1 orang )</option>
                        </select>
                    </div>

                    <!-- USIA -->
                    <div>
                        <label class="block text-xs font-semibold text-gray-600 mb-1">
                            USIA <span class="font-normal italic text-gray-600">(Wajib Diisi)</span>
                        </label>
                        <input type="text" name="usia" required inputmode="none" placeholder="Usia Anda"
                               class="kb-input w-full border border-gray-300 rounded-lg px-3 py-4 text-sm focus:outline-none focus:ring-2 focus:ring-yellow-500">
                    </div>

                    <!-- SEBUTKAN JUMLAHNYA (muncul kalau Rombongan) -->
                    <div id="jumlah_rombongan_wrapper" class="hidden">
                        <label class="block text-xs font-semibold text-gray-600 mb-1">
                            SEBUTKAN JUMLAHNYA ? (Orang) <span class="font-normal italic text-gray-600">(Wajib Diisi)</span>
                        </label>
                        <input type="text" name="jumlah_rombongan" id="jumlah_rombongan" inputmode="none" placeholder="Contoh: 5"
                               class="kb-input w-full border border-gray-300 rounded-lg px-3 py-4 text-sm focus:outline-none focus:ring-2 focus:ring-yellow-500">
                    </div>

                </div>

                <button type="submit"
                        class="w-full bg-yellow-500 hover:bg-yellow-600 text-gray-900 font-bold py-3 rounded-lg transition">
                    Simpan
                </button>
            </form>

        </div>
    </div>

    @include('partials.footer')

    <!-- Keyboard virtual custom -->
>>>>>>> DAVINBARU
    <div id="customKeyboard" class="hidden fixed bottom-0 left-0 w-full z-50 bg-[#18181b]/95 backdrop-blur border-t border-zinc-700 shadow-2xl py-3 px-4">
        <div class="max-w-3xl mx-auto w-full">
            <div id="kbKeys" class="flex flex-col gap-1.5 w-full"></div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
<<<<<<< HEAD
            const form = document.getElementById('guestForm');
            const formCard = document.getElementById('formCard');
            const thanksCard = document.getElementById('thanksCard');
            const thanksName = document.getElementById('thanksName');
            const errorBox = document.getElementById('errorBox');
            const errorList = document.getElementById('errorList');
            const backBtn = document.getElementById('backBtn');
            const mainContent = document.getElementById('mainContent');
            const submitBtn = form.querySelector('button[type="submit"]');

            form.addEventListener('submit', function (e) {
                e.preventDefault();

                errorList.innerHTML = '';
                let errors = [];

                const required = {
                    instansi: 'Instansi / Alamat wajib diisi',
                    nama: 'Nama wajib diisi',
                    jenis_kelamin: 'Jenis Kelamin wajib dipilih',
                    usia: 'Usia wajib diisi',
                    keperluan: 'Keperluan wajib dipilih',
                    sendirian: 'Pertanyaan "Anda Sendirian?" wajib dijawab',
                };

                const data = {};
                new FormData(form).forEach((value, key) => data[key] = value);

                for (const field in required) {
                    if (!data[field] || data[field].trim() === '') {
                        errors.push(required[field]);
                    }
                }

                // validasi tambahan: kalau rombongan, jumlah wajib diisi
                if (data.sendirian === 'Ya' && (!data.catatan_tambahan || data.catatan_tambahan.trim() === '')) {
                    errors.push('Jumlah rombongan wajib diisi');
                }

                if (errors.length > 0) {
                    errors.forEach(msg => {
                        const li = document.createElement('li');
                        li.textContent = msg;
                        errorList.appendChild(li);
                    });
                    errorBox.classList.remove('hidden');
                    return;
                }

                errorBox.classList.add('hidden');

                // disable tombol biar gak double submit
                submitBtn.disabled = true;
                const originalBtnText = submitBtn.textContent;
                submitBtn.textContent = 'Menyimpan...';

                fetch("{{ route('buku-tamu.store') }}", {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                    },
                    body: JSON.stringify(data)
                })
                .then(async res => {
                    if (!res.ok) {
                        const errData = await res.json().catch(() => null);
                        throw errData || { message: 'Gagal menyimpan data' };
                    }
                    return res.json();
                })
                .then(() => {
                    thanksName.textContent = data.nama ? ', ' + data.nama : '';
                    formCard.classList.add('hidden');
                    thanksCard.classList.remove('hidden');
                    closeKeyboard();
                })
                .catch(err => {
                    errorList.innerHTML = '';

                    if (err && err.errors) {
                        Object.values(err.errors).forEach(msgs => {
                            msgs.forEach(msg => {
                                const li = document.createElement('li');
                                li.textContent = msg;
                                errorList.appendChild(li);
                            });
                        });
                    } else {
                        const li = document.createElement('li');
                        li.textContent = (err && err.message) || 'Terjadi kesalahan saat menyimpan data. Silakan coba lagi.';
                        errorList.appendChild(li);
                    }

                    errorBox.classList.remove('hidden');
                })
                .finally(() => {
                    submitBtn.disabled = false;
                    submitBtn.textContent = originalBtnText;
                });
            });

            backBtn.addEventListener('click', function () {
                form.reset();
                errorBox.classList.add('hidden');
                thanksCard.classList.add('hidden');
                formCard.classList.remove('hidden');
                document.getElementById('extraFieldWrap').classList.add('hidden');
            });

            const sendirianSelect = document.getElementById('sendirianSelect');
            const extraFieldWrap = document.getElementById('extraFieldWrap');

            sendirianSelect.addEventListener('change', function () {
                if (this.value === 'Ya') {
                    extraFieldWrap.classList.remove('hidden');
                } else {
                    extraFieldWrap.classList.add('hidden');
                    extraFieldWrap.querySelector('input').value = '';
                }
            });

=======

            // Toggle jumlah rombongan
            const sendirianSelect = document.getElementById('anda_sendirian');
            const jumlahWrap = document.getElementById('jumlah_rombongan_wrapper');
            const jumlahInput = document.getElementById('jumlah_rombongan');

            sendirianSelect.addEventListener('change', function () {
                if (this.value === 'Rombongan') {
                    jumlahWrap.classList.remove('hidden');
                    jumlahInput.setAttribute('required', 'required');
                } else {
                    jumlahWrap.classList.add('hidden');
                    jumlahInput.removeAttribute('required');
                    jumlahInput.value = '';
                }
            });

            // Custom keyboard
>>>>>>> DAVINBARU
            const kbBox = document.getElementById('customKeyboard');
            const kbKeys = document.getElementById('kbKeys');
            let activeInput = null;
            let isShift = false;

            kbKeys.addEventListener('mousedown', e => e.preventDefault());
            kbKeys.addEventListener('touchstart', e => e.preventDefault(), { passive: false });

            const rows = [
                ['1', '2', '3', '4', '5', '6', '7', '8', '9', '0'],
                ['q', 'w', 'e', 'r', 't', 'y', 'u', 'i', 'o', 'p'],
                ['a', 's', 'd', 'f', 'g', 'h', 'j', 'k', 'l'],
                ['shift', 'z', 'x', 'c', 'v', 'b', 'n', 'm', 'bksp'],
                ['space', 'enter']
            ];

            function renderKeyboard() {
                kbKeys.innerHTML = '';
                rows.forEach(rowKeys => {
                    const rowEl = document.createElement('div');
                    rowEl.className = 'flex gap-1.5 w-full justify-center';

                    rowKeys.forEach(key => {
                        const btn = document.createElement('button');
                        btn.type = 'button';

                        let label = key;
                        let extraClass = 'flex-1';
                        let variant = '';

                        if (key === 'space') { label = 'Spasi'; extraClass = 'flex-[6]'; }
                        else if (key === 'enter') { label = 'Selesai'; extraClass = 'flex-[3]'; variant = 'kb-key-enter'; }
                        else if (key === 'bksp') { label = '⌫'; variant = 'kb-key-bksp'; }
                        else if (key === 'shift') { label = '⇧'; variant = 'kb-key-shift'; }
                        else { label = isShift ? key.toUpperCase() : key; }

                        btn.textContent = label;
                        btn.dataset.key = key;
                        btn.className = `kb-key ${variant} ${extraClass} h-11`;

                        btn.addEventListener('click', () => handleKey(key, btn));
                        rowEl.appendChild(btn);
                    });

                    kbKeys.appendChild(rowEl);
                });
            }

            function closeKeyboard() {
                kbBox.classList.add('hidden');
<<<<<<< HEAD
                mainContent.style.paddingBottom = '';
=======
>>>>>>> DAVINBARU
                if (activeInput) {
                    activeInput.blur();
                    activeInput = null;
                }
            }

            function handleKey(key, btn) {
                if (!activeInput) return;

                btn.classList.add('kb-pressed');
                setTimeout(() => btn.classList.remove('kb-pressed'), 100);

                if (key === 'bksp') {
                    activeInput.value = activeInput.value.slice(0, -1);
                } else if (key === 'space') {
                    activeInput.value += ' ';
                } else if (key === 'enter') {
                    closeKeyboard();
                    return;
                } else if (key === 'shift') {
                    isShift = !isShift;
                    renderKeyboard();
                    return;
                } else {
                    activeInput.value += isShift ? key.toUpperCase() : key;
                }

                activeInput.dispatchEvent(new Event('input', { bubbles: true }));
            }

            function adjustFormPosition(input) {
                setTimeout(() => {
<<<<<<< HEAD
                    const kbHeight = kbBox.offsetHeight || 220;
                    
                    mainContent.style.paddingBottom = `${kbHeight + 20}px`;

                    input.scrollIntoView({
                        behavior: 'smooth',
                        block: 'center'
                    });
=======
                    input.scrollIntoView({ behavior: 'smooth', block: 'center' });
>>>>>>> DAVINBARU
                }, 100);
            }

            document.querySelectorAll('.kb-input').forEach(input => {
                input.addEventListener('focus', () => {
                    activeInput = input;
                    kbBox.classList.remove('hidden');
                    adjustFormPosition(input);
                });
            });

            document.addEventListener('pointerdown', e => {
                const isInput = e.target.classList.contains('kb-input');
                const isKeyboard = e.target.closest('#customKeyboard');
<<<<<<< HEAD
                
=======
>>>>>>> DAVINBARU
                if (!isInput && !isKeyboard) {
                    closeKeyboard();
                }
            });

            renderKeyboard();
        });
    </script>

</body>
<<<<<<< HEAD

=======
>>>>>>> DAVINBARU
</html>