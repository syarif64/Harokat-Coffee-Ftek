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
            // Menambahkan kolom yang diperlukan
            $table->unsignedBigInteger('menu_id')->after('id');
            $table->string('nama_pelanggan')->after('menu_id');
            $table->string('status')->default('pending')->after('nama_pelanggan');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pesanans', function (Blueprint $table) {
            // Menghapus kolom jika migrasi dibatalkan (rollback)
            $table->dropColumn(['menu_id', 'nama_pelanggan', 'status']);
        });
    }
};