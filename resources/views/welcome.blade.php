<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Panel Buku Tamu - Dinas Arpus Jateng</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100">

    <div class="relative w-full h-screen overflow-hidden ">

        <!-- Foto gedung -->
        <img src="{{ asset('images/darpus.jpg') }}" alt="Gedung Arpus" class="absolute inset-0 w-full h-full object-cover object-[-250%_center]">

        <!-- Card putih -->
        <div class="relative z-10 bg-white h-full w-full md:w-[47%] p-8 flex flex-col justify-center shadow-xl rounded-4xl">

            <!-- Logo & Header -->
            <div class="flex items-center gap-3 mb-6">
                <img src="{{ asset('images/jateng.png') }}" alt="Logo" class="w-12 h-12">
                <div>
                    <h2 class="font-bold text-gray-800">Dinas Arpus</h2>
                    <p class="text-sm text-gray-600">Provinsi Jawa Tengah</p>
                </div>
            </div>

            <div class="w-16 h-1 bg-yellow-500 mb-4"></div>

            <!-- Judul -->
            <h1 class="text-3xl font-extrabold text-gray-900 mb-3">
                PANEL BUKU TAMU
            </h1>

            <!-- Deskripsi -->
            <p class="text-gray-600 mb-6">
                Selamat Datang di Dinas Kearsipan dan Perpustakaan Provinsi Jawa Tengah.
                Mohon mengisi Buku Tamu Elektronik kami.
            </p>

            <!-- Tombol -->
            <a href="{{ route('buku-tamu.create') }}"
               class="bg-yellow-500 hover:bg-yellow-600 text-gray-900 font-semibold px-13 py-3 rounded-lg w-fit transition">
                Mulai
            </a>

        </div>
    </div>

    @vite('resources/js/app.js')
</body>
</html>