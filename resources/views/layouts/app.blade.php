<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" type="image/png" href="{{ asset('favicon.png') }}">
    <title>{{ config('app.name', 'Buku Tamu') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/js/page-transition.js'])
</head>
<body class="bg-gray-50 font-sans antialiased">
    <div class="flex min-h-screen">

        <!-- Sidebar -->
        <aside class="w-64 bg-white border-r border-gray-200 flex flex-col fixed h-screen">

            <!-- Logo -->
            <div class="h-16 flex items-center gap-3 px-6 border-b border-gray-200">
                <img src="{{ asset('images/jateng.png') }}" alt="Logo" class="w-8 h-8">
                <div>
                    <p class="font-bold text-gray-900 text-sm leading-tight">Dinas Arpus</p>
                    <p class="text-xs text-gray-500">Jawa Tengah</p>
                </div>
            </div>

            <!-- Menu -->
            <nav class="flex-1 px-3 py-4 space-y-1">
                <a href="{{ route('dashboard') }}"
                   class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm font-medium transition
                          {{ request()->routeIs('dashboard') ? 'bg-yellow-500 text-gray-900' : 'text-gray-600 hover:bg-gray-100' }}">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                    </svg>
                    Dashboard
                </a>

                <a href="{{ route('buku-tamu.create') }}"
                   class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm font-medium text-gray-600 hover:bg-gray-100 transition">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                    </svg>
                    Form Buku Tamu
                </a>

                <a href="{{ route('profile.edit') }}"
                   class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm font-medium transition
                          {{ request()->routeIs('profile.edit') ? 'bg-yellow-500 text-gray-900' : 'text-gray-600 hover:bg-gray-100' }}">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                    </svg>
                    Profil
                </a>
            </nav>

            <!-- User & Logout -->
            <div class="border-t border-gray-200 p-3">
                <div class="px-3 py-2 mb-1">
                    <p class="text-sm font-semibold text-gray-800">{{ Auth::user()->name }}</p>
                    <p class="text-xs text-gray-500 truncate">{{ Auth::user()->email }}</p>
                </div>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit"
                            class="w-full flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm font-medium text-red-600 hover:bg-red-50 transition">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                        </svg>
                        Keluar
                    </button>
                </form>
            </div>
        </aside>

        <!-- Konten utama -->
        <div class="flex-1 ml-64">
            @if (isset($header))
                <header class="bg-white border-b border-gray-200 h-16 flex items-center px-8">
                    {{ $header }}
                </header>
            @endif

            <main>
                {{ $slot }}
            </main>
        </div>

    </div>
</body>
</html>