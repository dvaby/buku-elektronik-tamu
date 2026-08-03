<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800">Edit Pengunjung</h2>
    </x-slot>

    <div class="p-8">
        <div class="bg-white rounded-xl border border-gray-200 p-6 max-w-3xl">
            <form action="{{ route('pengunjung.update', $bukuTamu) }}" method="POST" class="space-y-4">
                @csrf
                @method('PUT')

                <div class="grid md:grid-cols-2 gap-4">
                    <label class="text-sm text-gray-700">
                        <span class="block mb-1">Identitas</span>
                        <input type="text" name="identitas" value="{{ old('identitas', $bukuTamu->identitas) }}" class="w-full border border-gray-300 rounded-lg px-3 py-2" required>
                    </label>
                    <label class="text-sm text-gray-700">
                        <span class="block mb-1">Nama</span>
                        <input type="text" name="nama" value="{{ old('nama', $bukuTamu->nama) }}" class="w-full border border-gray-300 rounded-lg px-3 py-2" required>
                    </label>
                    <label class="text-sm text-gray-700">
                        <span class="block mb-1">Nomor HP</span>
                        <input type="text" name="no_hp" value="{{ old('no_hp', $bukuTamu->no_hp) }}" class="w-full border border-gray-300 rounded-lg px-3 py-2">
                    </label>
                    <label class="text-sm text-gray-700">
                        <span class="block mb-1">Instansi / Alamat</span>
                        <input type="text" name="instansi_alamat" value="{{ old('instansi_alamat', $bukuTamu->instansi_alamat) }}" class="w-full border border-gray-300 rounded-lg px-3 py-2" required>
                    </label>
                    <label class="text-sm text-gray-700">
                        <span class="block mb-1">Keperluan</span>
                        <input type="text" name="keperluan" value="{{ old('keperluan', $bukuTamu->keperluan) }}" class="w-full border border-gray-300 rounded-lg px-3 py-2" required>
                    </label>
                    <label class="text-sm text-gray-700">
                        <span class="block mb-1">Pegawai yang ditemui</span>
                        <input type="text" name="pegawai_temui" value="{{ old('pegawai_temui', $bukuTamu->pegawai_temui) }}" class="w-full border border-gray-300 rounded-lg px-3 py-2">
                    </label>
                    <label class="text-sm text-gray-700">
                        <span class="block mb-1">Jenis Kelamin</span>
                        <select name="jenis_kelamin" class="w-full border border-gray-300 rounded-lg px-3 py-2" required>
                            <option value="Laki-laki" {{ old('jenis_kelamin', $bukuTamu->jenis_kelamin) == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                            <option value="Perempuan" {{ old('jenis_kelamin', $bukuTamu->jenis_kelamin) == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                        </select>
                    </label>
                    <label class="text-sm text-gray-700">
                        <span class="block mb-1">Anda Sendirian?</span>
                        <select name="anda_sendirian" class="w-full border border-gray-300 rounded-lg px-3 py-2" required>
                            <option value="Hanya saya" {{ old('anda_sendirian', $bukuTamu->anda_sendirian) == 'Hanya saya' ? 'selected' : '' }}>Hanya saya</option>
                            <option value="Rombongan" {{ old('anda_sendirian', $bukuTamu->anda_sendirian) == 'Rombongan' ? 'selected' : '' }}>Rombongan</option>
                        </select>
                    </label>
                    <label class="text-sm text-gray-700">
                        <span class="block mb-1">Jumlah Rombongan</span>
                        <input type="number" name="jumlah_rombongan" value="{{ old('jumlah_rombongan', $bukuTamu->jumlah_rombongan) }}" class="w-full border border-gray-300 rounded-lg px-3 py-2" min="2">
                    </label>
                    <label class="text-sm text-gray-700">
                        <span class="block mb-1">Usia</span>
                        <input type="number" name="usia" value="{{ old('usia', $bukuTamu->usia) }}" class="w-full border border-gray-300 rounded-lg px-3 py-2" required>
                    </label>
                </div>

                <div class="flex gap-3">
                    <button type="submit" class="bg-yellow-500 hover:bg-yellow-600 text-gray-900 font-semibold px-4 py-2 rounded-lg">Simpan</button>
                    <a href="{{ route('pengunjung.index') }}" class="bg-gray-200 hover:bg-gray-300 text-gray-700 font-semibold px-4 py-2 rounded-lg">Batal</a>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
