<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Panel Buku Tamu - Dinas Arpus Jateng</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100">

    <div class="relative w-full h-screen overflow-hidden flex flex-col md:block">

        <!-- Foto gedung -->
        <img src="{{ asset('images/darpus.jpg') }}" alt="Gedung Arpus"
             class="order-1 w-full h-1/2 md:h-full md:w-[65%] md:absolute md:top-0 md:right-0 object-cover object-[10%_center]">

        <!-- Card putih -->
        <div class="order-2 relative z-10 bg-white w-full h-1/2 md:h-full md:w-[47%] md:absolute md:top-0 md:left-0 p-6 md:p-8 flex flex-col justify-center shadow-xl rounded-none md:rounded-4xl">

            <!-- Logo & Header -->
            <div class="flex items-center gap-3 mb-4 md:mb-6">
                <img src="{{ asset('images/jateng.png') }}" alt="Logo" class="w-12 h-12 md:w-17 md:h-17">
                <div>
                    <h2 class="font-bold text-gray-800 text-lg md:text-2xl">Dinas Arpus</h2>
                    <p class="text-sm text-gray-600">Provinsi Jawa Tengah</p>
                </div>
            </div>

            <div class="w-16 h-1 bg-yellow-500 mb-4"></div>

            <!-- Judul -->
            <h1 class="text-2xl md:text-3xl font-extrabold text-gray-900 mb-3">
                PANEL BUKU TAMU
            </h1>

            <!-- Deskripsi -->
            <p class="text-gray-600 mb-6 text-sm md:text-base">
                Selamat Datang di Dinas Kearsipan dan Perpustakaan Provinsi Jawa Tengah.
                Mohon mengisi Buku Tamu Elektronik kami.
            </p>

            <!-- Tombol -->
            <a href="{{ route('buku-tamu.create') }}"
               class="bg-yellow-500 hover:bg-yellow-600 text-gray-900 font-semibold px-8 md:px-13 py-2.5 md:py-3 rounded-lg w-fit transition">
                Mulai
            </a>

        </div>
    </div>

    @vite('resources/js/app.js')
</body>
</html>