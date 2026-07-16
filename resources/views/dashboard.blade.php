<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Harokat-Coffee-Ftek</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body { margin: 0; background: #f5f5f5; font-family: 'Segoe UI', sans-serif; }
        .sidebar { width: 260px; height: 100vh; background: #111; position: fixed; left: 0; top: 0; padding: 25px; color: white; }
        .logo { color: #d4a373; font-size: 32px; font-weight: bold; margin-bottom: 10px; }
        .subtitle { color: #bdbdbd; margin-bottom: 30px; }
        .menu-item { display: block; color: white; text-decoration: none; padding: 14px 18px; border-radius: 12px; margin-bottom: 10px; transition: .3s; }
        .menu-item:hover, .menu-item.active { background: #8B5E3C; color: white; }
        .content { margin-left: 260px; padding: 30px; }
        .card-welcome { background: white; border-radius: 20px; padding: 30px; box-shadow: 0 5px 15px rgba(0,0,0,.08); }
        .btn-pesan-capsule-fix {
            display: inline-flex; align-items: center; justify-content: center; gap: 8px; width: 100%; padding: 10px 0;
            background: linear-gradient(180deg, #ba864d 0%, #8c5a2b 100%);
            color: #ffffff !important; font-size: 13px; font-weight: 700; border: 1px solid #d4a36a; border-radius: 50px; cursor: pointer;
        }
    </style>
</head>
<body>

<!-- Sidebar -->
<div class="sidebar">
    <div class="logo">☕ Harokat</div>
    <div class="subtitle">Coffee-Ftek</div>
    <a href="/" class="menu-item active"><i class="bi bi-grid"></i> Dashboard</a>
    <a href="{{ route('menus.index') }}" class="menu-item"><i class="bi bi-tags"></i> menu</a>
    <a href="{{ route('categories.index') }}" class="menu-item"><i class="bi bi-tags"></i> kategori</a>
    <a href="{{ route('pesanan.index') }}" class="menu-item"><i class="bi bi-cart"></i> Pesanan</a>
    <a href="#" class="menu-item"><i class="bi bi-people"></i> Pelanggan</a>
    <a href="#" class="menu-item"><i class="bi bi-bar-chart"></i> Laporan</a>
</div>

<!-- Main Content -->
<div class="content">
    <div class="card-welcome">
        <h1>Selamat Datang di Harokat-Coffee-Ftek ☕</h1>
    </div>

    <div class="mt-5">
        <h4 class="mb-4">Daftar Menu</h4>
        <div class="row">
            @forelse($menus as $menu)
                <div class="col-md-3 mb-4">
                    <div class="card h-100 shadow-sm border-0">
                        <img src="{{ $menu->foto_produk ? asset('storage/'.$menu->foto_produk) : 'https://via.placeholder.com/150' }}" class="card-img-top" style="height: 150px; object-fit: cover;">
                        <div class="card-body text-center">
                            <h6 class="fw-bold">{{ $menu->nama_menu }}</h6>
                            <p class="text-primary fw-bold">Rp {{ number_format($menu->harga, 0, ',', '.') }}</p>
                            
                            @if($menu->is_ready)
                                <button type="button" class="btn-pesan-capsule-fix" onclick="bukaModalPesan('{{ $menu->id }}')">
                                    PESAN
                                </button>
                            @else
                                <button class="btn-pesan-capsule-fix" disabled>MENU HABIS</button>
                            @endif
                        </div>
                    </div>
                </div>
            @empty
                <p>Belum ada menu.</p>
            @endforelse
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="modalPesan" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <form action="{{ route('pesanan.store') }}" method="POST" class="modal-content">
            @csrf
            <input type="hidden" name="menu_id" id="menu_id_input">
            <div class="modal-header"><h5>Input Data Pesanan</h5></div>
            <div class="modal-body">
                <div class="mb-3">
                    <label>Nama Pelanggan</label>
                    <input type="text" name="nama_pelanggan" class="form-control" required>
                </div>
            </div>
            <div class="modal-footer"><button type="submit" class="btn btn-primary">Konfirmasi</button></div>
        </form>
        
    </div>
</div>

<!-- Scripts -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
    function bukaModalPesan(id) {
        document.getElementById('menu_id_input').value = id;
        new bootstrap.Modal(document.getElementById('modalPesan')).show();
    }
</script>
</body>
</html>