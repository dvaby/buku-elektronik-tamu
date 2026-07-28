<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::get('/bukutamu', function () {
    return view('bukutamu');
});

Route::get('bukutamu/welcome/form', function () {
    return view('welcome.form');
})->name('welcome.form');

Route::get('bukutamu/authenticate', function () {
    return view('authenticate');
})->name('authenticate');

Route::post('bukutamu/authenticate', [AuthController::class, 'login'])->name('authenticate.post');

Route::get('bukutamu/index', [AuthController::class, 'index'])->name('index');