<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Pesanan - Harokat Coffee</title>
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
        .card-pesanan { background: white; border-radius: 20px; padding: 30px; box-shadow: 0 5px 15px rgba(0,0,0,.08); }
    </style>
</head>
<body>

<div class="sidebar">
    <div class="logo">☕ Harokat</div>
    <div class="subtitle">Coffee-Ftek</div>
    <a href="/" class="menu-item"><i class="bi bi-grid"></i> Dashboard</a>
    <a href="{{ route('menus.index') }}" class="menu-item"><i class="bi bi-tags"></i> menu</a>
    <a href="{{ route('categories.index') }}" class="menu-item"><i class="bi bi-tags"></i> kategori</a>
    <a href="{{ route('pesanan.index') }}" class="menu-item active"><i class="bi bi-cart"></i> Pesanan</a>
    <a href="#" class="menu-item"><i class="bi bi-people"></i> Pelanggan</a>
    <a href="#" class="menu-item"><i class="bi bi-bar-chart"></i> Laporan</a>
</div>

<div class="content">
    <div class="card-pesanan">
        <h4 class="mb-4">Daftar Pesanan Pelanggan</h4>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama Pelanggan</th>
                    <th>Menu</th>
                    <th>Jumlah</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @forelse($pesanans as $pesanan)
                <tr>
                    <td>{{ $pesanan->id }}</td>
                    <td>{{ $pesanan->nama_pelanggan }}</td>
                    <td>{{ $pesanan->nama_menu }}</td>
                    <td>{{ $pesanan->jumlah }}</td>
                    <td><span class="badge bg-warning text-dark">{{ $pesanan->status }}</span></td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="text-center">Belum ada pesanan masuk.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

</body>
</html>