<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BukuTamu extends Model
{
    protected $fillable = [
        'identitas',
        'no_hp',
        'instansi_alamat',
        'keperluan',
        'nama',
        'pegawai_temui',
        'jenis_kelamin',
        'anda_sendirian',
        'jumlah_rombongan',
        'usia',
    ];
}