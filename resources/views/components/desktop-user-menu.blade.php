<div>
    <div class="bg-white p-6 rounded-lg shadow-md text-gray-800">
        <h2 class="text-2xl font-bold mb-4">Daftar Menu</h2>
        <table class="w-full border-collapse border border-gray-200">
            <thead>
                <tr class="bg-gray-100">
                    <th class="border p-2">Nama Menu</th>
                    <th class="border p-2">Harga</th>
                </tr>
            </thead>
            <tbody>
                @foreach($menus as $menu)
                    <tr>
                        <td class="border p-2">{{ $menu->nama_menu }}</td>
                        <td class="border p-2">Rp {{ number_format($menu->harga, 0, ',', '.') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>