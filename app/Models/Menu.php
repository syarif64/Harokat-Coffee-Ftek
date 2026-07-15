<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    

protected $primaryKey = 'id';
protected $fillable = [
        'nama_menu',
        'harga',
        'foto_produk',
        'kategori',
        'deskripsi',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    
}