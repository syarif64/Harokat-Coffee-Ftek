<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HAROKAT.COFFEE - Daftar Menu</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Daftar Menu Harokat Coffee</h2>
        <a href="{{ route('menus.create') }}" class="btn text-white" style="background-color: #0d945a;">+ Tambah Menu Baru</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="card shadow-sm border-0">
        <div class="card-body p-0">
            <table class="table table-hover mb-0">
                <thead class="table-light">
                    <tr>
                        <th class="py-3 ps-4">No.</th> 
                        <th class="py-3">Foto</th>
                        <th class="py-3">Nama Menu</th>
                        <th class="py-3">Kategori</th>
                        <th class="py-3">Harga</th>
                        <th class="py-3">Deskripsi</th>
                        <th class="px-4 py-3 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($menus as $menu)
                        <tr style="{{ !$menu->is_ready ? 'opacity: 0.6; background-color: #fff5f5;' : '' }}">
                            <td class="py-3 ps-4 align-middle">
                                <strong>{{ $loop->iteration }}</strong>
                            </td>
                            <td class="align-middle">
                                @if($menu->foto_produk)
                                    <img src="{{ asset('storage/' . $menu->foto_produk) }}" width="50" class="rounded border">
                                @else
                                    <span class="text-muted small">Tanpa Foto</span>
                                @endif
                            </td>
                            <td class="align-middle">
                                <span class="{{ !$menu->is_ready ? 'text-decoration-line-through text-muted' : '' }}">
                                    {{ $menu->nama_menu }}
                                </span>
                            </td>
                            <td class="align-middle">{{ $menu->kategori }}</td>
                            <td class="align-middle">Rp {{ number_format($menu->harga, 0, ',', '.') }}</td>
                            <td class="align-middle text-secondary">{{ $menu->deskripsi ?? '-' }}</td>
                            <td class="align-middle text-center">
                                <div class="d-flex justify-content-center gap-2 align-items-center">
                                    <form action="{{ route('menus.toggleStatus', $menu->id) }}" method="POST">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit" class="btn btn-sm {{ $menu->is_ready ? 'btn-warning' : 'btn-success' }}">
                                            {{ $menu->is_ready ? 'Set Habis' : 'Set Tersedia' }}
                                        </button>
                                    </form>
                                    <form action="{{ route('menus.destroy', $menu->id) }}" method="POST" onsubmit="return confirm('Yakin hapus?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center py-4 text-muted">Belum ada menu yang ditambahkan.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

</body>
</html>