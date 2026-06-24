<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    // Fungsi untuk menambah kolom
    public function up(): void
    {
        Schema::table('menus', function (Blueprint $table) {
            $table->decimal('price_promo', 10, 2)->nullable();
            $table->boolean('is_best_seller')->default(false);
            $table->boolean('is_available')->default(true);
            $table->string('image_path')->nullable();
        });
    }

    // Fungsi untuk menghapus kolom (Rollback)
    public function down(): void
    {
        Schema::table('menus', function (Blueprint $table) {
            $table->dropColumn(['price_promo', 'is_best_seller', 'is_available', 'image_path']);
        });
    }
};