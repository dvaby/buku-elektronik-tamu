<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800">Informasi Pengguna</h2>
    </x-slot>

    <div class="p-8 space-y-6">

        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <div class="bg-white rounded-xl border border-gray-200 p-5">
                <p class="text-sm text-gray-500">Pengguna Aktif</p>
                <p class="text-3xl font-bold text-green-600 mt-1">{{ $pengunaAktif }}</p>
            </div>
            <div class="bg-white rounded-xl border border-gray-200 p-5">
                <p class="text-sm text-gray-500">Pengguna Tidak Aktif</p>
                <p class="text-3xl font-bold text-red-600 mt-1">{{ $penggunaTidakAktif }}</p>
            </div>
            <div class="bg-white rounded-xl border border-gray-200 p-5">
                <p class="text-sm text-gray-500">Kesalahan Login</p>
                <p class="text-3xl font-bold text-gray-400 mt-1">-</p>
                <p class="text-xs text-gray-400 mt-1">Belum ada sistem tracking</p>
            </div>
        </div>

        <div class="bg-white rounded-xl border border-gray-200 overflow-x-auto">
            <table class="min-w-full text-sm text-left">
                <thead class="bg-gray-50 text-gray-500 uppercase text-xs border-b border-gray-200">
                    <tr>
                        <th class="px-4 py-3 w-16">No</th>
                        <th class="px-4 py-3">Username</th>
                        <th class="px-4 py-3">User Group</th>
                        <th class="px-4 py-3">Status</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @forelse ($users as $index => $user)
                        <tr>
                            <td class="px-4 py-3 text-gray-500">{{ $index + 1 }}</td>
                            <td class="px-4 py-3 font-medium text-gray-900">{{ $user->name }}</td>
                            <td class="px-4 py-3 text-gray-600">{{ $user->group->nama ?? '-' }}</td>
                            <td class="px-4 py-3">
                                <span class="text-xs px-2 py-1 rounded-full {{ $user->aktif ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700' }}">
                                    {{ $user->aktif ? 'Active' : 'Nonaktif' }}
                                </span>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="4" class="px-4 py-6 text-center text-gray-400">Belum ada data pengguna.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>

    </div>
</x-app-layout>