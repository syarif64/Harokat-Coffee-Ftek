<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    protected $table = 'menus'; 

    // Mengizinkan kolom ini diisi data dari form
    protected $fillable = [
        'nama_menu',
        'kategori',
        'harga',
        'deskripsi',
        'foto_produk'
    ];
}