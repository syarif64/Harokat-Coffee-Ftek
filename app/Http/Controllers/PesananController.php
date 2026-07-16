<?php

namespace App\Http\Controllers;

use App\Models\Pesanan;
use App\Models\Menu; // WAJIB ADA: untuk mengambil data nama_menu
use Illuminate\Http\Request;

class PesananController extends Controller
{
   public function store(Request $request)
{
    $request->validate([
        'nama_pelanggan' => 'required',
        'menu_id'        => 'required',
        'jumlah'         => 'required|integer|min:1',
    ]);

    $menu = \App\Models\Menu::findOrFail($request->menu_id);

    \App\Models\Pesanan::create([
        'nama_pelanggan' => $request->nama_pelanggan,
        'menu_id'        => $request->menu_id,
        'nama_menu'      => $menu->nama_menu,
        'jumlah'         => $request->jumlah,
        'status'         => 'pending',
    ]);

    return redirect()->route('pesanan.index')->with('success', 'Pesanan berhasil dibuat!');
}

    public function index()
    {
        $pesanans = Pesanan::with('menu')->orderBy('id', 'desc')->get();
        return view('pesanan.index', compact('pesanans'));
    }
}