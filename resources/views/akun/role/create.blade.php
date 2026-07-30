<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800">Tambah Role</h2>
    </x-slot>

    <div class="p-8">
        <div class="bg-white rounded-xl border border-gray-200 p-6 max-w-xl">
            <form action="{{ route('role.store') }}" method="POST" class="space-y-4">
                @csrf

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Nama Privilege</label>
                    <input type="text" name="nama" value="{{ old('nama') }}" required
                           class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-yellow-500">
                    @error('nama') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Deskripsi</label>
                    <textarea name="deskripsi" rows="3"
                              class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-yellow-500">{{ old('deskripsi') }}</textarea>
                </div>

                <div class="flex gap-2">
                    <button type="submit" class="bg-yellow-500 hover:bg-yellow-600 text-gray-900 font-semibold text-sm px-5 py-2 rounded-lg">Simpan</button>
                    <a href="{{ route('role.index') }}" class="text-gray-600 text-sm px-5 py-2">Batal</a>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>