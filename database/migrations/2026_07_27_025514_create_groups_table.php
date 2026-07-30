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
    Schema::create('groups', function (Blueprint $table) {
        $table->id();
        $table->string('nama');
        $table->text('deskripsi')->nullable();
        $table->boolean('akses_penuh')->default(false); // true = Master Admin
        $table->timestamps();
    });
}

public function down(): void
{
    Schema::dropIfExists('groups');
}
};
