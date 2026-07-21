<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/buku-tamu/form', function () {
    return view('buku-tamu.form');
})->name('buku-tamu.form');