<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('buku_tamus', function (Blueprint $table) {
        $table->id();
        $table->string('identitas');
        $table->string('no_hp')->nullable();
        $table->string('instansi_alamat');
        $table->string('keperluan');
        $table->string('nama');
        $table->string('pegawai_temui')->nullable();
        $table->enum('jenis_kelamin', ['Laki-laki', 'Perempuan']);
        $table->enum('anda_sendirian', ['Hanya saya', 'Rombongan'])->default('Hanya saya');
        $table->integer('jumlah_rombongan')->nullable();
        $table->integer('usia');
        $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('buku_tamus');
    }
};
