<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Menu | Harokat Coffee</title>
    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Poppins', sans-serif; background-color: #f4f7f6; }
        .card { border: none; border-radius: 15px; overflow: hidden; }
        .table thead { background: #343a40; color: white; }
        .btn-action { transition: 0.3s; }
        .btn-action:hover { transform: scale(1.05); }
    </style>
</head>
<body>

<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold">Menu Kopi</h2>
        <a href="{{ route('menus.create') }}" class="btn btn-dark shadow-sm">+ Tambah Baru</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" id="alertBox">
            {{ session('success') }}
        </div>
    @endif

    <div class="card shadow-lg p-3">
        <table class="table table-hover align-middle">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nama Menu</th>
                    <th>Harga</th>
                    <th>Status</th>
                    <th class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($menus as $menu)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td class="fw-semibold">{{ $menu->nama_menu }}</td>
                    <td>Rp {{ number_format($menu->harga, 0, ',', '.') }}</td>
                    <td>
                        <span class="badge {{ $menu->is_ready ? 'bg-success' : 'bg-danger' }}">
                            {{ $menu->is_ready ? 'Tersedia' : 'Habis' }}
                        </span>
                    </td>
                    <td class="text-center">
                        <!-- Form Toggle -->
                        <form action="{{ route('menus.toggleStatus', $menu->id) }}" method="POST" class="d-inline">
                            @csrf @method('PATCH')
                            <button class="btn btn-sm btn-outline-warning btn-action">Update Status</button>
                        </form>
                        
                        <!-- Form Hapus dengan JavaScript Konfirmasi -->
                        <form action="{{ route('menus.destroy', $menu->id) }}" method="POST" class="d-inline" onsubmit="return confirmDelete()">
                            @csrf @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-outline-danger btn-action">Hapus</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr><td colspan="5" class="text-center">Belum ada data menu.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<!-- JavaScript Interaktif Sederhana -->
<script>
    // Konfirmasi sebelum hapus
    function confirmDelete() {
        return confirm("Apakah Anda yakin ingin menghapus menu ini?");
    }

    // Menghilangkan alert otomatis setelah 3 detik
    setTimeout(function() {
        let alertBox = document.getElementById('alertBox');
        if (alertBox) {
            alertBox.style.display = 'none';
        }
    }, 3000);
</script>

</body>
</html>