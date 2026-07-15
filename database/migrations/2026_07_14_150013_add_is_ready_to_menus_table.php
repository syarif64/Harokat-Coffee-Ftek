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
        Schema::table('menus', function (Blueprint $table) {
            // Menambahkan kolom 'is_ready' dengan tipe boolean setelah kolom 'deskripsi'
            $table->boolean('is_ready')->default(true)->after('deskripsi');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('menus', function (Blueprint $table) {
            // Menghapus kembali kolom 'is_ready' jika migrasi di-rollback
            $table->dropColumn('is_ready');
        });
    }
};