@extends('components.layout.index')

@section('content')
<!-- Main Content -->
<div class="container mx-auto px-6 py-10 flex justify-center items-center">
    <div class="flex flex-col md:flex-row bg-white rounded-lg shadow-lg overflow-hidden">
        <!-- Box Kiri -->
        <div class="w-full md:w-1/2 h-96">
            <img src="{{ asset('img/previewjurnal.png') }}" alt="Preview Jurnal" class="object-cover h-full w-full">
        </div>
        <!-- Box Kanan -->
        <div class="w-full md:w-1/2 p-6">
            <h1 class="text-2xl font-bold text-gray-800">Pengembangan Metode Neural Networks untuk Menentukan Karakter Seseorang</h1>
            <p class="mt-4 text-gray-600">Tujuan penelitian dalam jurnal ini adalah untuk mengidentifikasi karakteristik seseorang menggunakan metode jaringan syaraf tiruan (Neural Networks) dan untuk mempermudah serta mempercepat pekerjaan sarjana psikologi dalam membaca karakter seseorang dari gambar yang dibuat oleh pasien.</p>
            <button class="mt-6 px-4 py-2 bg-purple-800 text-white rounded-lg">Download</button>
        </div>
    </div>
</div>
<x-footer/>    
@endsection

