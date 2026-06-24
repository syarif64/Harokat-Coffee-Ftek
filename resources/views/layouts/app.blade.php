<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Harokat Coffee</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @fluxStyles
</head>
<body class="min-h-screen bg-white">
    
    <div class="flex">
        {{-- Memanggil file sidebar --}}
        @include('layouts.sidebar')

        <flux:main>
            {{-- Bagian inilah yang akan diisi oleh konten dari menu-page --}}
            @yield('content')
        </flux:main>
    </div>

    @fluxScripts
</body>
</html>