<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    protected $fillable = [
        'nama_pelanggan', 
        'menu_id', 
        'nama_menu', // Tambahkan ini
        'status'
    ];
}