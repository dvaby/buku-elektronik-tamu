<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log in Systems</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap"
        rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
        }

        @keyframes fadeSlideUp {
            from {
                opacity: 0;
                transform: translateY(24px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }

        .anim-card {
            animation: fadeSlideUp 0.7s ease-out both;
        }

        .anim-item {
            opacity: 0;
            animation: fadeSlideUp 0.6s ease-out forwards;
        }

        .delay-1 {
            animation-delay: 0.15s;
        }

        .delay-2 {
            animation-delay: 0.30s;
        }

        .delay-3 {
            animation-delay: 0.45s;
        }

        .delay-4 {
            animation-delay: 0.60s;
        }

        .delay-5 {
            animation-delay: 0.75s;
        }

        .delay-6 {
            animation-delay: 0.90s;
        }

        .input-anim {
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }

        .input-anim:focus {
            transform: scale(1.02);
        }
    </style>
</head>

<body class="min-h-screen relative overflow-hidden">

    {{-- Background foto gedung, full-bleed --}}
    <div class="fixed inset-0 -z-10">
        <img src="{{ asset('images/gedung-arpus.PNG') }}"
            alt="Gedung Dinas Kearsipan dan Perpustakaan Provinsi Jawa Tengah" class="w-full h-full object-cover">
        <div class="absolute inset-0"></div>
    </div>

    <main class="min-h-screen w-full flex items-center justify-center px-4 py-8">

        {{-- Card login, 2 kolom --}}
        <div class="anim-card w-full max-w-3xl grid grid-cols-1 md:grid-cols-2 rounded-2xl overflow-hidden shadow-2xl">

            {{-- Kolom kiri - "jendela" nunjukin foto asli + logo --}}
            <div class="hidden md:flex relative items-center justify-center overflow-hidden min-h-[420px]">
                <img src="{{ asset('images/perpustakaan.jpg') }}" alt="perpustakaan"
                    class="absolute inset-0 w-full h-full object-cover">
                <div class="absolute inset-0 "></div>

                {{-- Logo langsung di atas foto, tanpa panel putih --}}
                <div class="anim-item delay-1 relative z-10 px-5 py-3">
                    <img src="{{ asset('images/logo-arpus.webp') }}" alt="Logo Dinas Arpus Provinsi Jawa Tengah"
                        class="h-16 w-auto object-contain drop-shadow-[0_2px_10px_rgba(0,0,0,0.7)]">
                </div>
            </div>

            {{-- Kolom kanan - form login --}}
            <div class="bg-slate-100 flex flex-col justify-center px-7 md:px-9 py-8 md:py-9">

                <h1 class="anim-item delay-1 text-xl md:text-2xl font-extrabold text-[#1E3A5F] mb-1.5">
                    E-VISITOR
                </h1>
                <p class="anim-item delay-2 text-slate-500 text-xs mb-6">
                    Sistem Informasi Pengunjung <span class="font-semibold text-slate-600">Dinas Kearsipan</span>
                </p>

                <p class="anim-item delay-3 text-center text-sm font-semibold text-[#1E3A5F] mb-5 leading-snug">
                    Masukan Username dan Password anda<br class="hidden sm:block"> untuk Log In
                </p>

                @if ($errors->any())
                    <div
                        class="anim-item delay-3 mb-4 bg-red-50 border border-red-200 text-red-700 text-xs rounded-lg p-2.5">
                        @foreach ($errors->all() as $error)
                            <p>{{ $error }}</p>
                        @endforeach
                    </div>
                @endif

                <form action="{{ route('authenticate.post') }}" method="POST" class="space-y-4">
                    @csrf

                    <div class="anim-item delay-4">
                        <label class="block text-sm font-semibold text-[#1E3A5F] mb-1.5">Username</label>
                        <input type="text" name="username" required placeholder="Masukkan username" class="input-anim w-full bg-white border border-slate-300 rounded-lg px-3.5 py-2.5 text-sm placeholder:text-slate-400
                                   focus:outline-none focus:ring-2 focus:ring-yellow-400 focus:border-yellow-400">
                    </div>

                    <div class="anim-item delay-5">
                        <label class="block text-sm font-semibold text-[#1E3A5F] mb-1.5">Password</label>
                        <input type="password" name="password" required placeholder="Masukkan password" class="input-anim w-full bg-white border border-slate-300 rounded-lg px-3.5 py-2.5 text-sm placeholder:text-slate-400
                                   focus:outline-none focus:ring-2 focus:ring-yellow-400 focus:border-yellow-400">
                    </div>

                    <button type="submit" class="anim-item delay-6 w-full bg-yellow-400 hover:bg-yellow-500 transition-colors
                               text-[#1E3A5F] font-extrabold tracking-wide rounded-lg
                               px-6 py-2.5 shadow-md mt-3 hover:scale-[1.02] active:scale-[0.98] transition-transform">
                        MASUK
                    </button>

                </form>

                <p class="anim-item delay-6 text-center text-xs font-semibold text-[#1E3A5F] mt-6 leading-snug">
                    Dinas Kearsipan Dan Perpustakaan<br>
                    Provinsi Jawa Tengah
                </p>

            </div>

        </div>

    </main>

</body>

</html>