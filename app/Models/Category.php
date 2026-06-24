<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    /**
     * Field yang bisa diisi (Mass Assignment).
     * Pastikan nama kolom 'nama_kategori' sesuai dengan yang ada di tabel database kamu.
     */
    protected $fillable = [
        'nama_kategori',
    ];

    /**
     * Relasi ke model Menu.
     * 1 Kategori memiliki banyak Menu.
     */
    public function menus(): HasMany
    {
        return $this->hasMany(Menu::class);
    }
}