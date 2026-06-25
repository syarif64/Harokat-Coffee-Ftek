<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HAROKAT.COFFEE - Tambah Menu</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5 mb-5" style="max-width: 800px;">
    <h2 class="mb-4">☕ Rombok Menu Coffee</h2>

    <div class="card shadow-sm border-0">
        <div class="card-header bg-white py-3">
            <h5 class="mb-0 text-muted" style="font-weight: 400;">Tambah Menu Baru</h5>
        </div>
        <div class="card-body p-4">
            
            <form action="{{ route('menus.store') }}" method="POST" enctype="multipart/form-data">
                
                @csrf
                
                <div class="mb-3">
                    <label class="form-label">Nama Menu</label>
                    <input type="text" class="form-control" name="nama" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Kategori</label>
                    <select class="form-select" name="category_id" required>
                        <option selected disabled>Pilih Kategori</option>
                        <option value="1">Espresso Based</option>
                        <option value="2">Manual Brew</option>
                        <option value="3">Non Coffee</option>
                        <option value="4">Snack</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Harga</label>
                    <input type="number" class="form-control" name="harga" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Deskripsi</label>
                    <textarea class="form-control" name="deskripsi" rows="4"></textarea>
                </div>

                <div class="mb-4">
                    <label class="form-label">Foto Produk</label>
                    <input class="form-control" type="file" name="gambar">
                </div>

                <a href="{{ route('menus.index') }}" class="btn btn-secondary me-2">Kembali</a>
                <button type="submit" class="btn text-white" style="background-color: #0d945a;">Simpan Menu</button>
            </form>

        </div>
    </div>
</div>

</body>
</html>