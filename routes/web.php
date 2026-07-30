<?php

use Illuminate\Support\Facades\Route;

Route::get("/bukutamu", function () {
    return view('bukutamu');
});

Route::get("/bukutamu/welcome/form_buku", function () {
    return view('form_buku');
});
