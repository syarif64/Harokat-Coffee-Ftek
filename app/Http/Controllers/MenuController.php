<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MenuController extends Controller
{
    // Halaman Tabel Admin
    public function index()
    {
        $menus = Menu::orderBy('created_at', 'desc')->get();
        return view('menus.index', compact('menus'));
    }

    // Halaman Form Tambah Menu
    public function create()
    {
        return view('menus.create');
    }

    // Proses Menyimpan Data ke Database
    public function store(Request $request)
    {
        $request->validate([
            'nama_menu' => 'required|string|max:255',
            'kategori' => 'required|string',
            'harga' => 'required|numeric',
            'deskripsi' => 'nullable|string',
            'foto_produk' => 'nullable|image|mimes:jpeg,png,jpg|max:2048', // Max 2MB
        ]);

        $data = $request->all();

        // Proses upload foto jika ada
        if ($request->hasFile('foto_produk')) {
            $path = $request->file('foto_produk')->store('menus', 'public');
            $data['foto_produk'] = $path;
        }

        Menu::create($data);

        return redirect()->route('menus.index')->with('success', 'Berhasil! Menu baru telah ditambahkan.');
    }

    // Proses Menghapus Data
    public function destroy($id)
    {
        $menu = Menu::findOrFail($id);

        // Hapus file foto dari folder storage (jika ada)
        if ($menu->foto_produk && Storage::disk('public')->exists($menu->foto_produk)) {
            Storage::disk('public')->delete($menu->foto_produk);
        }

        // Hapus data dari database
        $menu->delete();

        return redirect()->route('menus.index')->with('success', 'Berhasil! Menu telah dihapus.');
    }
}