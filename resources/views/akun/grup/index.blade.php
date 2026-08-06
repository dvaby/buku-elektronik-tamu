<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800">Grup Pengguna</h2>
    </x-slot>

    <div class="p-8 space-y-4">

        @if (session('success'))
            <div class="bg-green-100 text-green-700 text-sm px-4 py-3 rounded-lg">{{ session('success') }}</div>
        @endif

        <div class="grid gap-4 md:grid-cols-3">
            <div class="rounded-xl border border-gray-200 bg-white p-4 shadow-sm">
                <p class="text-sm text-gray-500">Total Grup</p>
                <p class="mt-1 text-2xl font-semibold text-gray-900">{{ $groups->total() }}</p>
            </div>
            <div class="rounded-xl border border-gray-200 bg-white p-4 shadow-sm">
                <p class="text-sm text-gray-500">Akses Penuh</p>
                <p class="mt-1 text-2xl font-semibold text-gray-900">{{ $groups->where('akses_penuh', true)->count() }}</p>
            </div>
            <div class="rounded-xl border border-gray-200 bg-white p-4 shadow-sm">
                <p class="text-sm text-gray-500">Keterkaitan</p>
                <p class="mt-1 text-lg font-semibold text-gray-900">Dipakai untuk akun dan role</p>
            </div>
        </div>

        <div class="flex flex-col gap-3 md:flex-row md:items-center md:justify-between">
            <form method="GET" class="flex gap-2">
                <input type="text" name="cari" value="{{ request('cari') }}" placeholder="Cari nama grup..."
                       class="border border-gray-300 rounded-lg px-3 py-2 text-sm w-64 focus:outline-none focus:ring-2 focus:ring-yellow-500">
                <button class="bg-gray-800 text-white text-sm px-4 py-2 rounded-lg">Cari</button>
            </form>
            <div class="flex gap-2">
                <a href="{{ route('role.index') }}" class="rounded-lg border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50">
                    Lihat Role
                </a>
                <a href="{{ route('grup.create') }}" class="bg-yellow-500 hover:bg-yellow-600 text-gray-900 font-semibold text-sm px-4 py-2 rounded-lg">
                    + Tambah Grup
                </a>
            </div>
        </div>

        <div class="bg-white rounded-xl border border-gray-200 overflow-x-auto">
            <table class="min-w-full text-sm text-left">
                <thead class="bg-gray-50 text-gray-500 uppercase text-xs border-b border-gray-200">
                    <tr>
                        <th class="px-4 py-3">Nama Grup</th>
                        <th class="px-4 py-3">Deskripsi</th>
                        <th class="px-4 py-3">Privileges</th>
                        <th class="px-4 py-3">Akses Penuh</th>
                        <th class="px-4 py-3">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @forelse ($groups as $group)
                        <tr>
                            <td class="px-4 py-3 font-medium text-gray-900">{{ $group->nama }}</td>
                            <td class="px-4 py-3 text-gray-600">{{ $group->deskripsi ?? '-' }}</td>
                            <td class="px-4 py-3">
                                @if ($group->permissions->isNotEmpty())
                                    <div class="flex flex-wrap gap-1">
                                        @foreach ($group->permissions as $permission)
                                            <span class="rounded-full bg-yellow-100 px-2 py-1 text-[11px] font-medium text-yellow-700">
                                                {{ $permission->nama }}
                                            </span>
                                        @endforeach
                                    </div>
                                @else
                                    <span class="text-xs text-gray-400">Belum ada privilege</span>
                                @endif
                            </td>
                            <td class="px-4 py-3">
                                @if ($group->akses_penuh)
                                    <span class="bg-green-100 text-green-700 text-xs px-2 py-1 rounded-full">Ya</span>
                                @else
                                    <span class="bg-gray-100 text-gray-600 text-xs px-2 py-1 rounded-full">Tidak</span>
                                @endif
                            </td>
                            <td class="px-4 py-3 flex gap-2">
                                <a href="{{ route('grup.edit', $group->id) }}" class="text-blue-600 hover:underline text-xs font-medium">Edit</a>
                                <form action="{{ route('grup.destroy', $group->id) }}" method="POST" onsubmit="return confirm('Yakin hapus grup ini?')">
                                    @csrf @method('DELETE')
                                    <button class="text-red-600 hover:underline text-xs font-medium">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="5" class="px-4 py-6 text-center text-gray-400">Belum ada grup.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{ $groups->links() }}
    </div>
</x-app-layout>