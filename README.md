Instalasi
1. Clone Repository
bash
git clone <url-repo-ini>
cd buku-elektronik-tamu
2. Install Dependency PHP
bash
composer install
3. Setup Environment
bash
cp .env.example .env
php artisan key:generate

Pastikan konfigurasi database di .env menggunakan SQLite:

env
DB_CONNECTION=sqlite
4. Buat File Database
bash
touch database/database.sqlite

Windows (Command Prompt): type nul > database\database.sqlite

5. Jalankan Migration
bash
php artisan migrate
6. Buat Akun Admin
bash
php artisan tinker

Di dalam tinker:

php
\App\Models\User::create([
    'name' => 'Admin',
    'email' => 'admin@arpusjateng.go.id',
    'password' => bcrypt('password123'),
]);

Ketik exit untuk keluar.

7. Install Dependency JavaScript
bash
npm install
8. Siapkan Gambar

Pastikan folder public/images/ berisi:

darpus.jpg — foto gedung
jateng.png — logo instansi

Jika folder ini tidak ikut ter-push ke Git, minta file gambar secara terpisah dari pemilik project dan taruh manual di public/images/.

9. Jalankan Aplikasi

Buka 2 terminal terpisah:

Terminal 1 — Server Laravel:

bash
php artisan serve

Terminal 2 — Compile asset (wajib tetap berjalan selama development):

bash
npm run dev
10. Akses Aplikasi
Halaman	URL
Halaman Awal (Kiosk)	http://127.0.0.1:8000
Form Buku Tamu	http://127.0.0.1:8000/buku-tamu
Login Admin	http://127.0.0.1:8000/login
Dashboard	http://127.0.0.1:8000/dashboard

Akun default:

Email: admin@arpusjateng.go.id
Password: password123
