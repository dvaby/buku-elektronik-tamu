<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BukuTamuController;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

route::get('/buku-tamu', [BukuTamuController::class, 'create'])->name('buku-tamu.create');
route::post('/buku-tamu', [BukuTamuController::class, 'store'])->name('buku-tamu.store');