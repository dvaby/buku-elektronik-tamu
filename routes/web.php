<?php
use App\Http\Controllers\GroupController;
use App\Http\Controllers\UserManagementController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\BukuTamuController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KeperluanController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\PengunjungController;
use App\Http\Controllers\LaporanController;

Route::get('/', function () {
    return view('welcome.welcome');
})->name('welcome');

Route::get('/welcome', function () {
    return view('welcome.welcome');
})->name('welcome');

Route::get('/bukutamu', [BukuTamuController::class, 'create'])->name('bukutamu.create');
Route::post('/bukutamu', [BukuTamuController::class, 'store'])->name('bukutamu.store');

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('role', PermissionController::class)->parameters(['role' => 'role']);

    Route::get('/dashboard/chart-bulan', [DashboardController::class, 'chartBulan'])->middleware('auth')->name('dashboard.chart-bulan');
    Route::get('/dashboard/chart-tanggal', [DashboardController::class, 'chartTanggal'])->middleware('auth')->name('dashboard.chart-tanggal');
    Route::get('/dashboard/chart-keperluan', [DashboardController::class, 'chartKeperluan'])->middleware('auth')->name('dashboard.chart-keperluan');
    Route::get('/informasi-pengguna', [UserManagementController::class, 'informasi'])->name('akun-pengguna.informasi');
    Route::get('/pengunjung', [PengunjungController::class, 'index'])->name('pengunjung.index');
    Route::get('/laporan/harian', [LaporanController::class, 'harian'])->name('laporan.harian');
    Route::get('/laporan/harian/pdf', [LaporanController::class, 'harianPdf'])->name('laporan.harian.pdf');
    Route::get('/laporan/bulanan', [LaporanController::class, 'bulanan'])->name('laporan.bulanan');
    Route::get('/laporan/bulanan/pdf', [LaporanController::class, 'bulananPdf'])->name('laporan.bulanan.pdf');
    Route::get('/laporan/tahunan', [LaporanController::class, 'tahunan'])->name('laporan.tahunan');
    Route::get('/laporan/tahunan/pdf', [LaporanController::class, 'tahunanPdf'])->name('laporan.tahunan.pdf');
    Route::get('/laporan/custom', [LaporanController::class, 'custom'])->name('laporan.custom');
    Route::get('/laporan/custom/pdf', [LaporanController::class, 'customPdf'])->name('laporan.custom.pdf');

});

Route::middleware('auth')->group(function () {
    // ... route profile yang udah ada

    Route::resource('grup', GroupController::class)
        ->parameters(['grup' => 'grup']);

    Route::resource('akun-pengguna', UserManagementController::class)
        ->parameters(['akun-pengguna' => 'akun_pengguna']);

    Route::post('/akun-pengguna/{akun_pengguna}/toggle-aktif', [UserManagementController::class, 'toggleAktif'])
        ->name('akun-pengguna.toggle-aktif');


    Route::resource('keperluan', KeperluanController::class);

});
require __DIR__ . '/auth.php';