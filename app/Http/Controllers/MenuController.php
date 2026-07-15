<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MenuController extends Controller
{
    // Fungsi untuk menampilkan dashboard
    public function dashboard()
    {
        $menus = Menu::where('is_ready', true)->get();
        return view('dashboard', compact('menus'));
    }

    // Fungsi untuk menampilkan daftar menu di halaman index
    public function index()
    {
        $menus = Menu::orderBy('id', 'desc')->get(); 
        return view('menus.index', compact('menus')); 
    }

    // Fungsi untuk menampilkan form tambah menu
    public function create()
    {
        return view('menus.create'); 
    }

    // Fungsi untuk menyimpan menu baru
    public function store(Request $request)
    {
        $request->validate([
            'nama_menu'   => 'required|string|max:255',
            'kategori'    => 'required|string',
            'harga'       => 'required|numeric',
            'deskripsi'   => 'nullable|string',
            'foto_produk' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        $data = $request->all();

        if ($request->hasFile('foto_produk')) {
            $data['foto_produk'] = $request->file('foto_produk')->store('menu-images', 'public');
        }

        $data['is_ready'] = true; 
        Menu::create($data);

        return redirect()->route('menus.index')->with('success', 'Menu berhasil ditambahkan!');
    }

    // Fungsi untuk menghapus menu
    public function destroy($id)
    {
        $menu = Menu::findOrFail($id);
        if ($menu->foto_produk) {
            Storage::disk('public')->delete($menu->foto_produk);
        }
        $menu->delete();
        return redirect()->route('menus.index')->with('success', 'Menu berhasil dihapus!');
    }

    // Fungsi untuk mengubah status tersedia/habis
    public function toggleStatus($id)
    {
        $menu = Menu::findOrFail($id);
        $menu->is_ready = !$menu->is_ready; 
        $menu->save();
        return redirect()->back()->with('success', 'Status menu diperbarui!');
    }
    
}