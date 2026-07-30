<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800">Edit Akun Pengguna</h2>
    </x-slot>

    <div class="p-8">
        <div class="bg-white rounded-xl border border-gray-200 p-6 max-w-xl">
            <form action="{{ route('akun-pengguna.update', $user->id) }}" method="POST" class="space-y-4">
                @csrf @method('PUT')

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Nama</label>
                    <input type="text" name="name" value="{{ old('name', $user->name) }}" required
                           class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-yellow-500">
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                    <input type="email" name="email" value="{{ old('email', $user->email) }}" required
                           class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-yellow-500">
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Password <span class="text-gray-400 font-normal">(kosongkan kalau tidak ingin ganti)</span></label>
                    <input type="password" name="password"
                           class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-yellow-500">
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Grup</label>
                    <select name="group_id" class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-yellow-500">
                        <option value="">-- Pilih Grup --</option>
                        @foreach ($groups as $group)
                            <option value="{{ $group->id }}" {{ $user->group_id == $group->id ? 'selected' : '' }}>{{ $group->nama }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="flex gap-2">
                    <button type="submit" class="bg-yellow-500 hover:bg-yellow-600 text-gray-900 font-semibold text-sm px-5 py-2 rounded-lg">Update</button>
                    <a href="{{ route('akun-pengguna.index') }}" class="text-gray-600 text-sm px-5 py-2">Batal</a>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>