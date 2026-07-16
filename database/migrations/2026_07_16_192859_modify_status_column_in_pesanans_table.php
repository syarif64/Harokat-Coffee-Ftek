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
        Schema::table('pesanans', function (Blueprint $table) {
            // Mengubah tipe kolom menjadi string agar tidak terpotong (truncated)
            // Pastikan Anda sudah menjalankan 'composer require doctrine/dbal' di terminal
            $table->string('status', 50)->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pesanans', function (Blueprint $table) {
            // Mengembalikan ke tipe asal jika perlu
            $table->string('status', 20)->change();
        });
    }
};