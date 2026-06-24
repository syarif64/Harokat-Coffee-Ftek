# TODO - Perbaiki Codingan Harokat-Coffee-Ftek

## Step 1: Investigasi & temuan
- [x] Baca `routes/web.php` (tidak ada route `menus.*`)
- [x] Baca `MenuController.php` (validasi pakai field: nama_menu, kategori, harga, deskripsi, foto_produk)
- [x] Baca `database/migrations/*menus*` (ada kolom `nama_menu`, `kategori`, `harga`, `foto_produk`, plus update kolom `image_path`, `is_best_seller`, dll)
- [x] Baca `app/Models/Menu.php` (fillable tidak konsisten: nama/harga/gambar/category_id)
- [x] Baca `resources/views/menus/index.blade.php` & `create.blade.php` (pakai route `menus.index/create/store/destroy` dan field `foto_produk`, `nama_menu`, `kategori`, `harga`)
- [x] Baca Livewire `resources/views/Livewire/menu-manager.blade.php` (pakai field `image_path`, `nama_menu`, `category->nama_kategori`)

## Step 2: Rencana perbaikan (butuh konfirmasi skenario)
- [ ] Pilih salah satu:
  - [ ] Opsi 1: Tetap pakai `kategori` string di tabel `menus` (tanpa relasi categories)
  - [ ] Opsi 2: Refactor jadi `category_id` (ubah skema + relasi Eloquent + form/view)

## Step 3: Implementasi setelah konfirmasi
- [ ] Tambahkan route `menus.*` di `routes/web.php`
- [ ] Samakan field konsisten di `Menu` model + controller + blade + Livewire
- [ ] Perbaiki view Livewire supaya sesuai kolom tabel (`foto_produk` vs `image_path`, dan `kategori` vs relasi `category`)
- [ ] Pastikan `menu-page.blade.php` extend layout yang benar

## Step 4: Test
- [ ] `php artisan route:list` pastikan route `menus.*` ada
- [ ] Cek halaman `/menu` dan `/menus/*`

