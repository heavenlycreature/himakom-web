@extends('components.layout.index')

@section('content')
<x-navbar/>

    <!-- Main Content -->
<main>
    <!-- Bagian Ketua Himpunan -->
    <section class="relative lg:bg-about bg-cover bg-center">
        <div class="container mx-auto flex flex-col lg:flex-row lg:items-center py-24">
            <div class="bg-transparent p-8 max-w-lg">
                <h1 class="text-4xl text-slate-700 lg:text-purple-500 font-bold">Hello, I'm</h1>
                <h2 class="text-5xl text-gray-800 lg:text-purple-600 font-extrabold">{{ $kahim->nama }}</h2>
                <h3 class="text-2xl lg:text-slate-500 text-purple-400 font-semibold mb-4">Ketua HIMAKOM</h3>
                <p class="text-slate-600 lg:text-slate-400 ">{{ $kahim->bio }}</p>
            </div>
            <div class="mx-auto">
                <img src="{{ asset('storage/' . $kahim->img) }}" alt="Ketua HIMAKOM" class="h-96">
            </div>
        </div>
    </section>

    <!-- Visi Misi Section -->
    <section class="bg-custom-visi-misi text-black py-20" style="background-image: url('img/backgroundvisimisi.png'); background-size: cover; background-position: center;">
        <div class="container mx-auto flex flex-col md:flex-row items-center px-6">
            <div class="md:w-1/2">
                <img src="{{ asset('img/pages/about/fotohimpunan.png') }}" alt="Foto Bersama Himpunan" class="rounded">
            </div>
            <div class="md:w-1/2 bg-transparent-box p-8 rounded">
                <h2 class="text-4xl font-bold mb-4">VISI & MISI</h2>
                {!! $kahim['visi-misi'] !!}
            </div>
        </div>
    </section>

    <!-- Bagian Program Kerja -->
    <section class="relative" style="background-image: url('img/background/backgroundproker.png'); background-size: cover; background-position: center;">
        <div class="container mx-auto py-24">
            <h2 class="text-4xl font-bold text-center text-purple-800 mb-12">Program Kerja</h2>
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                    @foreach ($proker as $data)       
                    <div class="bg-white p-8 rounded-lg shadow-lg text-center">
                        <img src="{{ asset('img/logo/logoproker.png') }}" alt="Logo Proker" class="mx-auto mb-4">
                        <h3 class="text-base md:text-lg font-semibold text-purple-800 mb-2">{{ $data->judul }}</h3>
                        <p>{{ $data->deskripsi }}</p>
                    </div>
                    @endforeach
            </div>
        </div>
    </section>
</main>
<x-footer/>
@endsection