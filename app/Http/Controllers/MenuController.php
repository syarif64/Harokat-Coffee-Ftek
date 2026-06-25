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

    // Proses Menyimpan Data
    public function store(Request $request)
    {
        $data = $request->validate([
            'nama_menu' => 'required',
            'kategori' => 'required',
            'harga' => 'required|numeric',
            'foto_produk' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        // Proses upload foto jika ada
        if ($request->hasFile('foto_produk')) {
            $data['foto_produk'] = $request->file('foto_produk')->store('menus', 'public');
        }

        // Simpan ke database
        Menu::create([
            'nama_menu'   => $request->nama_menu,
            'kategori'    => $request->kategori,
            'harga'       => $request->harga,
            'deskripsi'   => $request->deskripsi,
            'foto_produk' => $data['foto_produk'] ?? null
        ]);

        return redirect()->route('menus.index')->with('success', 'Berhasil! Menu baru telah ditambahkan.');
    }

    // Proses Menghapus Data
    public function destroy($id)
    {
        $menu = Menu::findOrFail($id);

        // Hapus file foto dari storage jika ada (menggunakan nama kolom yang benar: foto_produk)
        if ($menu->foto_produk && Storage::disk('public')->exists($menu->foto_produk)) {
            Storage::disk('public')->delete($menu->foto_produk);
        }

        $menu->delete();

        return redirect()->route('menus.index')->with('success', 'Berhasil! Menu telah dihapus.');
    }
}