<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" type="image/png" href="{{ asset('favicon.png') }}">
    <title>Buku Tamu Elektronik - Dinas Arpus Jateng</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }

        @keyframes marquee {
            0%   { transform: translateX(100%); }
            100% { transform: translateX(-100%); }
        }
        .animate-marquee {
            display: inline-block;
            animation: marquee 35s linear infinite;
        }

        #customKeyboard { font-family: 'Plus Jakarta Sans', sans-serif; }
        #customKeyboard .kb-key {
            background: #27272a;
            border: 1px solid #3f3f46;
            color: #f4f4f5;
            font-weight: 600;
            font-size: 0.9rem;
            border-radius: 6px;
            transition: all 0.08s ease;
            user-select: none;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        #customKeyboard .kb-key:hover { background: #3f3f46; border-color: #52525b; }
        #customKeyboard .kb-key:active,
        #customKeyboard .kb-key.kb-pressed {
            background: #facc15;
            color: #18181b;
            border-color: #eab308;
            transform: scale(0.96);
        }
        #customKeyboard .kb-key-enter {
            background: #eab308;
            color: #18181b;
            border-color: #ca8a04;
            font-weight: 700;
        }
        #customKeyboard .kb-key-enter:hover { background: #facc15; }
        #customKeyboard .kb-key-bksp,
        #customKeyboard .kb-key-shift { background: #3f3f46; color: #f4f4f5; }
    </style>
</head>
<body class="relative min-h-screen">

    <!-- Tombol Back -->
<a href="{{ route('welcome') }}"
   class="fixed top-14 left-4 z-50 flex items-center gap-3 bg-white/90 hover:bg-white text-gray-900 font-bold text-lg px-6 py-3 rounded-xl shadow-lg transition">
    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
        <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
    </svg>
    Kembali
</a>

    <!-- Foto background -->
    <img src="{{ asset('images/darpus.jpg') }}" alt="Gedung Arpus" class="fixed inset-0 w-full h-full object-cover -z-10">
    <div class="fixed inset-0 bg-black/60 -z-10"></div>

    <!-- Teks berjalan -->
    <div class="bg-yellow-500 text-gray-900 font-semibold text-2xl px-4 p-2 overflow-hidden whitespace-nowrap">
        <span class="animate-marquee">
            Selamat Datang di Dinas Kearsipan dan Perpustakaan Provinsi Jawa Tengah — Mohon isi Buku Tamu Elektronik dengan data yang benar
        </span>
    </div>

    <div class="flex items-center justify-center px-4 py-8 pb-40">
        <div class="bg-white/95 backdrop-blur rounded-2xl shadow-2xl p-6 md:p-8 w-full max-w-3xl">

            <h1 class="text-center text-2xl md:text-3xl font-extrabold text-gray-900 pb-3 mb-6 border-b-2 border-yellow-500">
    BUKU TAMU ELEKTRONIK
</h1>

            <form action="{{ route('bukutamu.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
                @csrf

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

                    <!-- IDENTITAS -->
                    <div>
                        <label class="block text-x font-semibold text-gray-600 mb-1 p-5      px-4">
                            IDENTITAS <span class="font-normal italic text-red-600">(Wajib Diisi)</span>
                        </label>
                        <input type="text" name="identitas" required inputmode="none"
                               placeholder="Kartu Tanda Penduduk / SIM / Kartu Pelajar"
                               class="kb-input w-full border border-gray-300 rounded-lg px-4 p-2 text-lg focus:outline-none focus:ring-2 focus:ring-yellow-500">
                    </div>

                    <!-- NOMOR HP -->
                    <div>
                        <label class="block text-x font-semibold text-gray-600 mb-1 p-2 px-4">
                            NOMOR HP <span class="font-normal italic text-red-600">(Data akan kami jaga kerahasiaannya)</span>
                        </label>
                        <input type="text" name="no_hp" inputmode="none" placeholder="Nomor yang bisa dihubungi"
                               class="kb-input w-full border border-gray-300 rounded-lg px-4 p-2 text-lg focus:outline-none focus:ring-2 focus:ring-yellow-500">
                    </div>

                    <!-- INSTANSI / ALAMAT -->
                    <div>
                        <label class="block text-x font-semibold text-gray-600 mb-1 p-2 px-4">
                            INSTANSI / ALAMAT <span class="font-normal italic text-red-600">(Wajib Diisi)</span>
                        </label>
                        <input type="text" name="instansi_alamat" required inputmode="none"
                               placeholder="Instansi anda bekerja / Alamat anda"
                               class="kb-input w-full border border-gray-300 rounded-lg px-4 p-2 text-lg focus:outline-none focus:ring-2 focus:ring-yellow-500">
                    </div>

                    <!-- KEPERLUAN -->
                    <div>
    <label class="block text-x font-semibold text-gray-600 mb-1 p-2 px-4">
        KEPERLUAN <span class="font-normal italic text-red-600">(Wajib Diisi)</span>
    </label>
    <select name="keperluan" required
        style="background-image: url('data:image/svg+xml;charset=UTF-8,%3csvg xmlns=%27http://www.w3.org/2000/svg%27 viewBox=%270 0 24 24%27 fill=%27none%27 stroke=%27%23374151%27 stroke-width=%272%27%3e%3cpath d=%27M6 9l6 6 6-6%27/%3e%3c/svg%3e'); background-repeat: no-repeat; background-position: right 1rem center; background-size: 1.25rem;"
        class="w-full appearance-none border border-gray-300 rounded-lg pl-4 pr-10 py-3 text-lg bg-white focus:outline-none focus:ring-2 focus:ring-green-500">
    <option value="">-- Pilih --</option>
    @foreach ($keperluans as $item)
        <option value="{{ $item->nama }}">{{ $item->nama }}</option>
    @endforeach
</select>
</div>
                    <!-- NAMA -->
                    <div>
                        <label class="block text-x font-semibold text-gray-600 mb-1 p-2 px-4">
                            NAMA <span class="font-normal italic text-red-600">(Wajib Diisi)</span>
                        </label>
                        <input type="text" name="nama" required inputmode="none" placeholder="Nama Lengkap Anda"
                               class="kb-input w-full border border-gray-300 rounded-lg px-4 p-2 text-lg focus:outline-none focus:ring-2 focus:ring-yellow-500">
                    </div>

                    <!-- PEGAWAI YANG INGIN DITEMUI -->
                    <div>
                        <label class="block text-x font-semibold text-gray-600 mb-1 p-2 px-4">
                            PEGAWAI YANG INGIN ANDA TEMUI ?
                        </label>
                        <input type="text" name="pegawai_temui" inputmode="none" placeholder="Boleh tidak diisi"
                               class="kb-input w-full border border-gray-300 rounded-lg px-4 p-2 text-lg focus:outline-none focus:ring-2 focus:ring-yellow-500">
                    </div>

                    <!-- JENIS KELAMIN -->
                   <div>
    <label class="block text-x font-semibold text-gray-600 mb-1 p-2 px-4">
        JENIS KELAMIN <span class="font-normal italic text-red-600">(Wajib Diisi)</span>
    </label>
    <div class="flex flex-col gap-3 text-black text-sm">
        <label class="flex items-center gap-3 cursor-pointer">
            <input type="radio" name="jenis_kelamin" value="Laki-laki" required class="accent-green-500 w-6 h-6">
            <span class="text-lg">LAKI - LAKI</span>
        </label>
        <label class="flex items-center gap-3 cursor-pointer">
            <input type="radio" name="jenis_kelamin" value="Perempuan" required class="accent-green-500 w-6 h-6">
            <span class="text-lg">PEREMPUAN</span>
        </label>
    </div>
</div>

                    <!-- ANDA SENDIRIAN -->
<div>
    <label class="block text-x font-semibold text-gray-600 mb-1 p-2 px-4">
        ANDA SENDIRIAN ? <span class="font-normal italic text-red-600">(Wajib Diisi)</span>
    </label>
    <select name="anda_sendirian" id="anda_sendirian" required
        style="background-image: url('data:image/svg+xml;charset=UTF-8,%3csvg xmlns=%27http://www.w3.org/2000/svg%27 viewBox=%270 0 24 24%27 fill=%27none%27 stroke=%27%23374151%27 stroke-width=%272%27%3e%3cpath d=%27M6 9l6 6 6-6%27/%3e%3c/svg%3e'); background-repeat: no-repeat; background-position: right 1rem center; background-size: 1.25rem;"
        class="w-full appearance-none border border-gray-300 rounded-lg pl-3 pr-10 py-4 text-lg bg-white focus:outline-none focus:ring-2 focus:ring-yellow-500">
    <option value="" selected disabled>-- Pilih --</option>
    <option value="Hanya saya">Hanya saya</option>
    <option value="Rombongan">Rombongan ( Lebih dari 1 orang )</option>
</select>
</div>

                    <!-- USIA -->
                    <div>
                        <label class="block text-x font-semibold text-gray-600 mb-1 p-2 px-4">
                            USIA <span class="font-normal italic text-red-600">(Wajib Diisi)</span>
                        </label>
                        <input type="text" name="usia" required inputmode="none" placeholder="Usia Anda"
                               class="kb-input w-full border border-gray-300 rounded-lg px-4 p-2 text-lg focus:outline-none focus:ring-2 focus:ring-yellow-500">
                    </div>

                    <!-- SEBUTKAN JUMLAHNYA (muncul kalau Rombongan) -->
                    <div id="jumlah_rombongan_wrapper" class="hidden">
                        <label class="block text-x font-semibold text-gray-600 mb-1 p-2 px-4">
                            SEBUTKAN JUMLAHNYA ? (Orang) <span class="font-normal italic text-red-600">(Wajib Diisi)</span>
                        </label>
                        <input type="text" name="jumlah_rombongan" id="jumlah_rombongan" inputmode="none" placeholder="Contoh: 5"
                               class="kb-input w-full border border-gray-300 rounded-lg px-4 p-2 text-lg focus:outline-none focus:ring-2 focus:ring-yellow-500">
                    </div>

                </div>

                <button type="submit"
        class="w-full bg-yellow-500 hover:bg-yellow-600 text-gray-900 font-bold text-lg px-4 py-4 rounded-lg transition">
    Simpan
</button>
            </form>

        </div>
    </div>

    @include('partials.footer')

    <!-- Keyboard virtual custom -->
    <div id="customKeyboard" class="hidden fixed bottom-0 left-0 w-full z-50 bg-[#18181b]/95 backdrop-blur border-t border-zinc-700 shadow-2xl py-3 px-4">
        <div class="max-w-3xl mx-auto w-full">
            <div id="kbKeys" class="flex flex-col gap-1.5 w-full"></div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', () => {

            // Toggle jumlah rombongan
            const sendirianSelect = document.getElementById('anda_sendirian');
            const jumlahWrap = document.getElementById('jumlah_rombongan_wrapper');
            const jumlahInput = document.getElementById('jumlah_rombongan');

            sendirianSelect.addEventListener('change', function () {
                if (this.value === 'Rombongan') {
                    jumlahWrap.classList.remove('hidden');
                    jumlahInput.setAttribute('required', 'required');
                } else {
                    jumlahWrap.classList.add('hidden');
                    jumlahInput.removeAttribute('required');
                    jumlahInput.value = '';
                }
            });

            // Custom keyboard
            const kbBox = document.getElementById('customKeyboard');
            const kbKeys = document.getElementById('kbKeys');
            let activeInput = null;
            let isShift = false;

            kbKeys.addEventListener('mousedown', e => e.preventDefault());
            kbKeys.addEventListener('touchstart', e => e.preventDefault(), { passive: false });

            const rows = [
                ['1', '2', '3', '4', '5', '6', '7', '8', '9', '0'],
                ['q', 'w', 'e', 'r', 't', 'y', 'u', 'i', 'o', 'p'],
                ['a', 's', 'd', 'f', 'g', 'h', 'j', 'k', 'l'],
                ['shift', 'z', 'x', 'c', 'v', 'b', 'n', 'm', 'bksp'],
                ['space', 'enter']
            ];

            function renderKeyboard() {
                kbKeys.innerHTML = '';
                rows.forEach(rowKeys => {
                    const rowEl = document.createElement('div');
                    rowEl.className = 'flex gap-1.5 w-full justify-center';

                    rowKeys.forEach(key => {
                        const btn = document.createElement('button');
                        btn.type = 'button';

                        let label = key;
                        let extraClass = 'flex-1';
                        let variant = '';

                        if (key === 'space') { label = 'Spasi'; extraClass = 'flex-[6]'; }
                        else if (key === 'enter') { label = 'Selesai'; extraClass = 'flex-[3]'; variant = 'kb-key-enter'; }
                        else if (key === 'bksp') { label = '⌫'; variant = 'kb-key-bksp'; }
                        else if (key === 'shift') { label = '⇧'; variant = 'kb-key-shift'; }
                        else { label = isShift ? key.toUpperCase() : key; }

                        btn.textContent = label;
                        btn.dataset.key = key;
                        btn.className = `kb-key ${variant} ${extraClass} h-11`;

                        btn.addEventListener('click', () => handleKey(key, btn));
                        rowEl.appendChild(btn);
                    });

                    kbKeys.appendChild(rowEl);
                });
            }

            function closeKeyboard() {
                kbBox.classList.add('hidden');
                if (activeInput) {
                    activeInput.blur();
                    activeInput = null;
                }
            }

            function handleKey(key, btn) {
                if (!activeInput) return;

                btn.classList.add('kb-pressed');
                setTimeout(() => btn.classList.remove('kb-pressed'), 100);

                if (key === 'bksp') {
                    activeInput.value = activeInput.value.slice(0, -1);
                } else if (key === 'space') {
                    activeInput.value += ' ';
                } else if (key === 'enter') {
                    closeKeyboard();
                    return;
                } else if (key === 'shift') {
                    isShift = !isShift;
                    renderKeyboard();
                    return;
                } else {
                    activeInput.value += isShift ? key.toUpperCase() : key;
                }

                activeInput.dispatchEvent(new Event('input', { bubbles: true }));
            }

            function adjustFormPosition(input) {
                setTimeout(() => {
                    input.scrollIntoView({ behavior: 'smooth', block: 'center' });
                }, 100);
            }

            document.querySelectorAll('.kb-input').forEach(input => {
                input.addEventListener('focus', () => {
                    activeInput = input;
                    kbBox.classList.remove('hidden');
                    adjustFormPosition(input);
                });
            });

            document.addEventListener('pointerdown', e => {
                const isInput = e.target.classList.contains('kb-input');
                const isKeyboard = e.target.closest('#customKeyboard');
                if (!isInput && !isKeyboard) {
                    closeKeyboard();
                }
            });

            renderKeyboard();
        });
    </script>

</body>
</html>