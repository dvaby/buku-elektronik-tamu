<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <link rel="icon" type="image/png" href="{{ asset('favicon.png') }}">
    <title>Panel Buku Tamu - Dinas Arpus Jateng</title>
    @vite(['resources/css/app.css', 'resources/js/page-transition.js'])
</head>
<body class="bg-gray-100">

    <div class="relative w-full h-screen overflow-hidden flex flex-col md:block">

        <!-- Foto gedung -->
        <img src="{{ asset('images/darpus.jpg') }}" alt="Gedung Arpus"
             class="order-1 w-full h-1/2 md:h-full md:w-[65%] md:absolute md:top-0 md:right-0 object-cover object-[10%_center]">

            <!-- Overlay gelap -->
        <div class="absolute top-0 right-0 h-full w-[100%] bg-black/30"></div>


        <!-- Card putih -->
        <div class="order-2 relative z-10 bg-white w-full h-1/2 md:h-full md:w-[52%] md:absolute p-6 md:p-8 flex flex-col justify-center shadow-xl rounded-none md:rounded-3xl">

            <!-- Logo & Header -->
            <div class="flex items-center gap-3 mb-4 md:mb-11">
                <img src="{{ asset('images/jateng.png') }}" alt="Logo" class="w-18 h-20 md:w-25 md:h-25">
                <div>
                    <h2 class="font-bold text-gray-800 text-lg md:text-4xl">Dinas Arpus</h2>
                    <p class="text-sm text-gray-600 md:text-2xl">Provinsi Jawa Tengah</p>
                </div>
            </div>

            <div class="w-16 h-1 bg-yellow-500 mb-5"></div>

            <!-- Judul -->
            <h1 class="text-3xl md:text-4xl font-extrabold text-gray-900 mb-6">
                PANEL BUKU TAMU
            </h1>

            <!-- Deskripsi -->
            <p class="text-gray-600 mb-10 text-sm md:text-2xl">
                Selamat Datang di Dinas Kearsipan dan Perpustakaan Provinsi Jawa Tengah.
                Mohon mengisi Buku Tamu Elektronik kami.
            </p>

            <!-- Tombol -->
            <a href="{{ route('buku-tamu.create') }}"
               class="bg-yellow-500 hover:bg-yellow-600 text-gray-900 font-semibold px-8 md:px-17 py-2.5 md:py-4 rounded-lg w-fit transition md:text-2xl">
                Mulai
            </a>

        </div>
    </div>

    @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/js/page-transition.js'])
</body>
</html>