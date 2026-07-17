<div class="bg-white p-6 rounded-lg shadow-sm border border-zinc-200">
    <div class="overflow-x-auto">
        <table class="w-full text-left">
            <thead>
                <tr class="border-b border-zinc-200">
                    <th class="py-3 px-4 text-zinc-600">Nama Menu</th>
                    <th class="py-3 px-4 text-zinc-600">Kategori</th>
                    <th class="py-3 px-4 text-zinc-600">Harga</th>
                </tr>
            </thead>
            <tbody>
                @foreach($menus as $menu)
                <tr class="border-b border-zinc-100 hover:bg-zinc-50">
                    <td class="py-3 px-4">{{ $menu->nama_menu }}</td>
                    <td class="py-3 px-4">
                        <span class="inline-flex items-center px-2 py-1 rounded bg-zinc-100 text-sm">
                            {{ $menu->category->name ?? 'Umum' }}
                        </span>
                    </td>
                    <td class="py-3 px-4">Rp {{ number_format($menu->harga, 0, ',', '.') }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>