@extends('layouts.app')

@section('content')
    <div class="p-6">
        <h1 class="text-3xl font-bold mb-6 text-zinc-900">Menu & Kategori</h1>
        
        {{-- Memanggil komponen Livewire --}}
        <livewire:menu-manager />
    </div>
@endsection