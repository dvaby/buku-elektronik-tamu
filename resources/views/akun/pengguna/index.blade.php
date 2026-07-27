<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800">Akun Pengguna</h2>
    </x-slot>

    <div class="p-8 space-y-4">

        @if (session('success'))
            <div class="bg-green-100 text-green-700 text-sm px-4 py-3 rounded-lg">{{ session('success') }}</div>
        @endif

        <div class="flex justify-between items-center">
            <form method="GET" class="flex gap-2">
                <input type="text" name="cari" value="{{ request('cari') }}" placeholder="Cari nama..."
                       class="border border-gray-300 rounded-lg px-3 py-2 text-sm w-64 focus:outline-none focus:ring-2 focus:ring-yellow-500">
                <button class="bg-gray-800 text-white text-sm px-4 py-2 rounded-lg">Cari</button>
            </form>
            <a href="{{ route('akun-pengguna.create') }}" class="bg-yellow-500 hover:bg-yellow-600 text-gray-900 font-semibold text-sm px-4 py-2 rounded-lg">
                + Tambah Akun
            </a>
        </div>

        <div class="bg-white rounded-xl border border-gray-200 overflow-x-auto">
            <table class="min-w-full text-sm text-left">
                <thead class="bg-gray-50 text-gray-500 uppercase text-xs border-b border-gray-200">
                    <tr>
                        <th class="px-4 py-3">Nama</th>
                        <th class="px-4 py-3">Email</th>
                        <th class="px-4 py-3">Grup</th>
                        <th class="px-4 py-3">Status</th>
                        <th class="px-4 py-3">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @forelse ($users as $user)
                        <tr>
                            <td class="px-4 py-3 font-medium text-gray-900">{{ $user->name }}</td>
                            <td class="px-4 py-3 text-gray-600">{{ $user->email }}</td>
                            <td class="px-4 py-3 text-gray-600">{{ $user->group->nama ?? '-' }}</td>
                            <td class="px-4 py-3">
                                <form action="{{ route('akun-pengguna.toggle-aktif', $user->id) }}" method="POST">
                                    @csrf
                                    <button class="text-xs px-2 py-1 rounded-full {{ $user->aktif ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700' }}">
                                        {{ $user->aktif ? 'Aktif' : 'Nonaktif' }}
                                    </button>
                                </form>
                            </td>
                            <td class="px-4 py-3 flex gap-2">
                                <a href="{{ route('akun-pengguna.edit', $user->id) }}" class="text-blue-600 hover:underline text-xs font-medium">Edit</a>
                                <form action="{{ route('akun-pengguna.destroy', $user->id) }}" method="POST" onsubmit="return confirm('Yakin hapus akun ini?')">
                                    @csrf @method('DELETE')
                                    <button class="text-red-600 hover:underline text-xs font-medium">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="5" class="px-4 py-6 text-center text-gray-400">Belum ada akun.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{ $users->links() }}
    </div>
</x-app-layout>