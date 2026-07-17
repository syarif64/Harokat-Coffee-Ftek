<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MenuController extends Controller
{
    // Fungsi untuk menampilkan dashboard (MENAMPILKAN SEMUA MENU)
    public function dashboard()
    {
        $menus = Menu::orderBy('id', 'desc')->get();
        return view('dashboard', compact('menus'));
    }

    // Fungsi untuk menampilkan daftar menu di halaman index
    public function index()
    {
        $menus = Menu::orderBy('id', 'desc')->get(); 
        return view('menus.index', compact('menus')); 
    }

    // ... (Fungsi lainnya tetap sama)
    public function create()
    {
        $categories = Category::all();
        return view('menus.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_menu'   => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
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

    public function destroy($id)
    {
        $menu = Menu::findOrFail($id);
        if ($menu->foto_produk) {
            Storage::disk('public')->delete($menu->foto_produk);
        }
        $menu->delete();
        return redirect()->route('menus.index')->with('success', 'Menu berhasil dihapus!');
    }

    public function toggleStatus($id)
    {
        $menu = Menu::findOrFail($id);
        $menu->is_ready = !$menu->is_ready; 
        $menu->save();
        return redirect()->back()->with('success', 'Status menu diperbarui!');
    }
}