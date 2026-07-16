<?php

namespace App\Http\Controllers;

use App\Models\Pesanan;
use Illuminate\Http\Request;

class PesananController extends Controller
{
    public function index()
    {
        // Mengambil semua data pesanan
        $pesanans = Pesanan::orderBy('id', 'desc')->get();
        return view('pesanan.index', compact('pesanans'));
    }
}