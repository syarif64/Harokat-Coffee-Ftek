<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Harokat Coffee - Kelola Kategori</title>
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
    </style>
</head>
<body>

<div class="sidebar">
    <div class="logo">☕ Harokat</div>
    <div class="subtitle">Coffee-Ftek</div>
    <a href="{{ route('dashboard.view') }}" class="menu-item"><i class="bi bi-grid"></i> Dashboard</a>
    <a href="{{ route('menus.index') }}" class="menu-item"><i class="bi bi-tags"></i> Menu</a>
    <a href="{{ route('categories.index') }}" class="menu-item active"><i class="bi bi-tags"></i> Kategori</a>
    <a href="{{ route('pesanan.index') }}" class="menu-item"><i class="bi bi-cart"></i> Pesanan</a>
    <a href="#" class="menu-item"><i class="bi bi-people"></i> Pelanggan</a>
    <a href="#" class="menu-item"><i class="bi bi-bar-chart"></i> Laporan</a>
</div>

<div class="content">
    <div class="card shadow-sm border-0">
        <div class="card-body p-4">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h4 class="mb-0">Kelola Kategori</h4>
                <button class="btn text-white" style="background-color: #0d945a;" data-bs-toggle="modal" data-bs-target="#modalTambah">
                    <i class="bi bi-plus-lg"></i> Tambah Kategori
                </button>
            </div>

            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @if(session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <div class="table-responsive">
                <table class="table table-hover mb-0">
                    <thead class="table-light">
                        <tr>
                            <th class="py-3">No</th>
                            <th class="py-3">Nama Kategori</th>
                            <th class="py-3">Jumlah Menu</th>
                            <th class="py-3 text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($categories as $category)
                            <tr>
                                <td class="py-3 align-middle">{{ $loop->iteration }}</td>
                                <td class="py-3 align-middle fw-medium">{{ $category->name }}</td>
                                <td class="py-3 align-middle">
                                    <span class="badge bg-secondary">{{ $category->menus_count }} menu</span>
                                </td>
                                <td class="py-3 align-middle text-center">
                                    <button class="btn btn-sm btn-outline-primary me-1" 
                                            data-bs-toggle="modal" 
                                            data-bs-target="#modalEdit{{ $category->id }}">
                                        <i class="bi bi-pencil"></i>
                                    </button>
                                    <form action="{{ route('categories.destroy', $category->id) }}" method="POST" 
                                          onsubmit="return confirm('Yakin ingin menghapus kategori {{ $category->name }}?')" 
                                          style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-outline-danger">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>

                            <!-- Modal Edit -->
                            <div class="modal fade" id="modalEdit{{ $category->id }}" tabindex="-1" aria-hidden="true">
                                <div class="modal-dialog">
                                    <form action="{{ route('categories.update', $category->id) }}" method="POST" class="modal-content">
                                        @csrf
                                        @method('PUT')
                                        <div class="modal-header">
                                            <h5 class="modal-title">Edit Kategori</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="mb-3">
                                                <label class="form-label">Nama Kategori</label>
                                                <input type="text" name="name" class="form-control" value="{{ $category->name }}" required>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                            <button type="submit" class="btn" style="background-color: #0d945a; color: white;">Simpan</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center py-4 text-muted">Belum ada kategori. Tambahkan kategori baru!</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Modal Tambah -->
<div class="modal fade" id="modalTambah" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <form action="{{ route('categories.store') }}" method="POST" class="modal-content">
            @csrf
            <div class="modal-header">
                <h5 class="modal-title">Tambah Kategori</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label class="form-label">Nama Kategori</label>
                    <input type="text" name="name" class="form-control" placeholder="Contoh: Espresso, Manual Brew" required>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <button type="submit" class="btn" style="background-color: #0d945a; color: white;">Simpan</button>
            </div>
        </form>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>