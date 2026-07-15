<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Harokat-Coffee-Ftek</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

<style>

body{
    margin:0;
    background:#f5f5f5;
    font-family:'Segoe UI',sans-serif;
}

.sidebar{
    width:260px;
    height:100vh;
    background:#111;
    position:fixed;
    left:0;
    top:0;
    padding:25px;
}

.logo{
    color:#d4a373;
    font-size:32px;
    font-weight:bold;
    margin-bottom:10px;
}

.subtitle{
    color:#bdbdbd;
    margin-bottom:30px;
}

.menu-item{
    display:block;
    color:white;
    text-decoration:none;
    padding:14px 18px;
    border-radius:12px;
    margin-bottom:10px;
    transition:.3s;
}

.menu-item:hover{
    background:#8B5E3C;
    color:white;
}

.menu-item.active{
    background:#8B5E3C;
    color:white;
}

.content{
    margin-left:260px;
    padding:30px;
}

.card-welcome{
    background:white;
    border-radius:20px;
    padding:30px;
    box-shadow:0 5px 15px rgba(0,0,0,.08);
}

</style>

</head>
<body>

<div class="sidebar">

    <div class="logo">
        ☕ Harokat
    </div>

    <div class="subtitle">
        Coffee-Ftek
    </div>

    <a href="/" class="menu-item active">
        <i class="bi bi-grid"></i>
        Dashboard
    </a>

</a>
    <a href="{{ route('menus.index') }}" class="menu-item">
        <i class="bi bi-tags"></i> menu
    </a>

</a>
    <a href="{{ route('categories.index') }}" class="menu-item">
        <i class="bi bi-tags"></i> kategori
    </a>
</a>

    <a href="#" class="menu-item">
        <i class="bi bi-cart"></i>
        Pesanan
    </a>

    <a href="#" class="menu-item">
        <i class="bi bi-people"></i>
        Pelanggan
    </a>

    <a href="#" class="menu-item">
        <i class="bi bi-bar-chart"></i>
        Laporan
    </a>

</div>

<div class="content">

    <div class="card-welcome">

        <h1>Selamat Datang di Harokat-Coffee-Ftek ☕</h1>

        <p>
            Sistem Manajemen Coffee Shop berbasis Laravel.
        </p>

    </div>
<!-- Mulai Daftar Menu -->
<div class="mt-5">
    <h4 class="mb-4">Daftar Menu Tersedia</h4>
    <div class="row">
        @forelse($menus as $menu)
            <div class="col-md-3 mb-4">
                <div class="card h-100 shadow-sm border-0">
                    <!-- Cek apakah ada foto -->
                    @if($menu->foto_produk)
                        <img src="{{ asset('storage/' . $menu->foto_produk) }}" class="card-img-top" style="height: 150px; object-fit: cover;" alt="{{ $menu->nama_menu }}">
                    @else
                        <div class="card-img-top bg-secondary d-flex align-items-center justify-content-center text-white" style="height: 150px;">Tidak ada foto</div>
                    @endif
                    
                    <div class="card-body text-center">
                        <h6 class="card-title fw-bold">{{ $menu->nama_menu }}</h6>
                        <p class="text-muted small mb-1">{{ $menu->kategori }}</p>
                        <p class="text-primary fw-bold mb-0">Rp {{ number_format($menu->harga, 0, ',', '.') }}</p>
                <button class="btn-pesan-capsule" onclick="tambahKePesanan('{{ $menu->id ?? '' }}')">
    <!-- Ikon Keranjang Belanja SVG -->
    <!-- 1. KODE CSS UNTUK MENGOBAH WARNA & BENTUK KAPSUL -->
<style>
    .btn-pesan-capsule-fix {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
        width: 100%;
        padding: 10px 0;
        
        /* Gradasi warna karamel sesuai sidebar aktif Anda */
        background: linear-gradient(180deg, #ba864d 0%, #8c5a2b 100%); 
        color: #ffffff !important; /* Memaksa teks menjadi putih */
        
        font-size: 13px;
        font-weight: 700;
        letter-spacing: 1px;
        
        /* Membuat bentuk kapsul lonjong tanpa garis hitam kaku */
        border: 1px solid #d4a36a; 
        border-radius: 50px; 
        
        cursor: pointer;
        transition: all 0.2s ease-in-out;
    }

    /* Efek saat kursor menyentuh tombol */
    .btn-pesan-capsule-fix:hover {
        background: linear-gradient(180deg, #cc965c 0%, #a16b38 100%);
    }
</style>

<!-- 2. KODE HTML TOMBOLNYA -->
<button class="btn-pesan-capsule-fix" onclick="tambahKePesanan('{{ $menu->id ?? '' }}')">
    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" viewBox="0 0 24 24">
        <path d="M7 18c-1.1 0-1.99.9-1.99 2S5.9 22 7 22s2-.9 2-2-.9-2-2-2zM1 2v2h2l3.6 7.59-1.35 2.45c-.16.28-.25.61-.25.96 0 1.1.9 2 2 2h12v-2H7.42c-.14 0-.25-.11-.25-.25l.03-.12.9-1.63h7.45c.75 0 1.41-.41 1.75-1.03l3.58-6.49c.08-.14.12-.31.12-.48 0-.55-.45-1-1-1H5.21l-.94-2H1zm16 16c-1.1 0-1.99.9-1.99 2s.89 2 1.99 2 2-.9 2-2-.9-2-2-2z"/>
    </svg>
    <span>PESAN</span>
</button>
                    </div>
                </div>
            </div>
 <!-- Penutup div bawaan dashboard Anda -->
        @empty
            <div class="col-12">
                <div class="alert alert-info text-center">
                    Belum ada menu yang ditambahkan ke dalam sistem.
                </div>
            </div>
        @endforelse
    </div>
</div>
<!-- Akhir Daftar Menu -->
</div>

</body>
</html>