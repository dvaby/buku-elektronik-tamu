<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel Buku Tamu - Dinas Arpus Jateng</title>
    @vite('resources/css/app.css')
</head>
<body class="min-h-screen bg-slate-900 text-slate-800">
    <div class="relative min-h-screen overflow-hidden">
        <img src="{{ asset('images/darpus.jpg') }}" alt="Gedung Arpus" class="absolute inset-0 h-full w-full object-cover">
        <div class="absolute inset-0 bg-slate-950/60"></div>

        <div class="relative z-10 flex min-h-screen items-center justify-center px-4 py-6 sm:px-6 lg:px-8">
            <div class="w-full max-w-6xl overflow-hidden rounded-[2rem] bg-white/95 shadow-2xl ring-1 ring-black/5 backdrop-blur-sm lg:grid lg:grid-cols-[1.1fr_0.9fr]">
                <div class="relative min-h-[260px] lg:min-h-full">
                    <img src="{{ asset('images/darpus.jpg') }}" alt="Gedung Dinas Arpus" class="h-full w-full object-cover">
                    <div class="absolute inset-0 bg-gradient-to-t from-slate-950/70 via-slate-900/20 to-transparent"></div>
                    <div class="absolute bottom-6 left-6 right-6 text-white sm:bottom-8 sm:left-8 sm:right-8">
                        <p class="text-sm uppercase tracking-[0.3em] text-yellow-300">Digital Service</p>
                        <h2 class="mt-2 text-xl font-semibold sm:text-2xl">Selamat datang di layanan buku tamu elektronik</h2>
                    </div>
                </div>

                <div class="flex items-center p-6 sm:p-8 lg:p-10">
                    <div class="w-full">
                        <div class="flex items-center gap-3">
                            <img src="{{ asset('images/jateng.png') }}" alt="Logo Pemerintah Jawa Tengah" class="h-12 w-12 sm:h-14 sm:w-14">
                            <div>
                                <h2 class="text-lg font-bold text-gray-800 sm:text-xl">Dinas Arpus</h2>
                                <p class="text-sm text-gray-600">Provinsi Jawa Tengah</p>
                            </div>
                        </div>

                        <div class="mt-6 h-1 w-16 rounded-full bg-yellow-500"></div>

                        <h1 class="mt-4 text-3xl font-black uppercase tracking-wide text-gray-900 sm:text-4xl">
                            Panel Buku Tamu
                        </h1>

                        <p class="mt-4 text-base leading-7 text-gray-600 sm:text-lg">
                            Selamat datang di Dinas Kearsipan dan Perpustakaan Provinsi Jawa Tengah.
                            Mohon mengisi buku tamu elektronik kami dengan data yang benar.
                        </p>

                        <a href="{{ route('buku-tamu.create') }}"
                           class="mt-8 inline-flex items-center justify-center rounded-lg bg-yellow-500 px-6 py-3 font-semibold text-gray-900 transition hover:bg-yellow-600 focus:outline-none focus:ring-2 focus:ring-yellow-400 focus:ring-offset-2 sm:px-8">
                            Mulai
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @vite('resources/js/app.js')
</body>
</html>