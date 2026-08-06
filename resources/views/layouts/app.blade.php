<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" type="image/png" href="{{ asset('favicon.png') }}">
    <title>{{ config('app.name', 'Buku Tamu') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
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

                @if (Auth::user()->hasPermission('Kelola Feedback') || Auth::user()->hasPermission('Lihat Feedback'))
                    <a href="{{ route('dashboard.feedback.index') }}"
                       class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm font-medium transition
                              {{ request()->routeIs('dashboard.feedback.*') ? 'bg-yellow-500 text-gray-900' : 'text-gray-600 hover:bg-gray-100' }}">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M8 10h8M8 14h5m-7 4h10a2 2 0 002-2V8a2 2 0 00-2-2H6a2 2 0 00-2 2v10a2 2 0 002 2z" />
                        </svg>
                        Feedback
                    </a>
                @endif

                <div x-data="{ open: {{ request()->routeIs('akun-pengguna.*') || request()->routeIs('grup.*') || request()->routeIs('role.*') ? 'true' : 'false' }} }">

    <button @click="open = !open"
            class="w-full flex items-center justify-between gap-3 px-3 py-2.5 rounded-lg text-sm font-medium text-gray-600 hover:bg-gray-100 transition">
        <span class="flex items-center gap-3">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
            </svg>
            Akun Pengguna
        </span>
        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 transition-transform" :class="open ? 'rotate-90' : ''" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
        </svg>
    </button>

    <div x-show="open" x-collapse class="pl-8 mt-1 space-y-1">
        <a href="{{ route('akun-pengguna.index') }}"
           class="block px-3 py-2 rounded-lg text-sm transition
                  {{ request()->routeIs('akun-pengguna.index') || request()->routeIs('akun-pengguna.create') || request()->routeIs('akun-pengguna.edit') ? 'text-yellow-600 font-semibold' : 'text-gray-500 hover:text-gray-800' }}">
            Akun Pengguna
        </a>
        @if (Auth::user()->hasPermission('Kelola Grup'))
            <a href="{{ route('grup.index') }}"
               class="block px-3 py-2 rounded-lg text-sm transition
                      {{ request()->routeIs('grup.*') ? 'text-yellow-600 font-semibold' : 'text-gray-500 hover:text-gray-800' }}">
                Grup Pengguna
            </a>
        @endif
        @if (Auth::user()->hasPermission('Kelola Privileges'))
            <a href="{{ route('role.index') }}"
               class="block px-3 py-2 rounded-lg text-sm transition
                      {{ request()->routeIs('role.*') ? 'text-yellow-600 font-semibold' : 'text-gray-500 hover:text-gray-800' }}">
                Role Pengguna
            </a>
        @endif
        @if (Auth::user()->hasPermission('Kelola Akun'))
            <a href="{{ route('akun-pengguna.index') }}"
               class="block px-3 py-2 rounded-lg text-sm transition
                      {{ request()->routeIs('akun-pengguna.index') || request()->routeIs('akun-pengguna.create') || request()->routeIs('akun-pengguna.edit') ? 'text-yellow-600 font-semibold' : 'text-gray-500 hover:text-gray-800' }}">
                Akun Pengguna
            </a>
        @endif
        <a href="{{ route('akun-pengguna.informasi') }}"
           class="block px-3 py-2 rounded-lg text-sm transition
                  {{ request()->routeIs('akun-pengguna.informasi') ? 'text-yellow-600 font-semibold' : 'text-gray-500 hover:text-gray-800' }}">
            Informasi Pengguna
        </a>
    </div>
</div>

<a href="{{ route('keperluan.index') }}"
   class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm font-medium transition
          {{ request()->routeIs('keperluan.*') ? 'bg-yellow-500 text-gray-900' : 'text-gray-600 hover:bg-gray-100' }}">
    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
        <path stroke-linecap="round" stroke-linejoin="round" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
        <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
    </svg>
    Pengaturan Keperluan
</a>

                <a href="{{ route('pengunjung.index') }}"
   class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm font-medium transition
          {{ request()->routeIs('pengunjung.*') ? 'bg-yellow-500 text-gray-900' : 'text-gray-600 hover:bg-gray-100' }}">
    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
        <path stroke-linecap="round" stroke-linejoin="round" d="M17 20h5v-2a4 4 0 00-3-3.87M9 20H4v-2a4 4 0 013-3.87m6-1a4 4 0 100-8 4 4 0 000 8zm6 3a4 4 0 10-8 0" />
    </svg>
    Pengunjung
</a>

                <div x-data="{ open: {{ request()->routeIs('laporan.*') ? 'true' : 'false' }} }">

    <button @click="open = !open"
            class="w-full flex items-center justify-between gap-3 px-3 py-2.5 rounded-lg text-sm font-medium text-gray-600 hover:bg-gray-100 transition">
        <span class="flex items-center gap-3">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M9 17v-2a4 4 0 014-4h4m0 0l-3-3m3 3l-3 3M4 6h16M4 6a2 2 0 002 2h12a2 2 0 002-2M4 6a2 2 0 012-2h12a2 2 0 012 2" />
            </svg>
            Laporan
        </span>
        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 transition-transform" :class="open ? 'rotate-90' : ''" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
        </svg>
    </button>

    <div x-show="open" x-collapse class="pl-8 mt-1 space-y-1">
        <a href="{{ route('laporan.harian') }}"
           class="block px-3 py-2 rounded-lg text-sm transition
                  {{ request()->routeIs('laporan.harian') ? 'text-yellow-600 font-semibold' : 'text-gray-500 hover:text-gray-800' }}">
            Harian
        </a>
        <a href="{{ route('laporan.bulanan') }}"
           class="block px-3 py-2 rounded-lg text-sm transition
                  {{ request()->routeIs('laporan.bulanan') ? 'text-yellow-600 font-semibold' : 'text-gray-500 hover:text-gray-800' }}">
            Bulanan
        </a>
        <a href="{{ route('laporan.tahunan') }}"
           class="block px-3 py-2 rounded-lg text-sm transition
                  {{ request()->routeIs('laporan.tahunan') ? 'text-yellow-600 font-semibold' : 'text-gray-500 hover:text-gray-800' }}">
            Tahunan
        </a>
        <a href="{{ route('laporan.custom') }}"
           class="block px-3 py-2 rounded-lg text-sm transition
                  {{ request()->routeIs('laporan.custom') ? 'text-yellow-600 font-semibold' : 'text-gray-500 hover:text-gray-800' }}">
            Custom
        </a>
    </div>
</div>
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