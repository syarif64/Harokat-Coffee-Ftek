<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Menu;
use App\Models\Category; // Jangan lupa import ini

class MenuManager extends Component
{
    public function render()
    {
        return view('livewire.menu-manager', [
            'menus' => Menu::all(),
            'categories' => Category::all() // Kita ambil data kategorinya juga
        ]);
    }
}