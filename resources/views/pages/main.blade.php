@extends('components.layout.index')

@section('content')
<x-navbar/>
    <!-- Hero Section -->
<section id="beranda" class="relative h-screen bg-cover bg-center text-white" style="background-image: url('{{ asset('img/pages/home/bg-home.jpg') }}');">
    <div class="container mx-auto h-full flex flex-col justify-center items-center">
        <h1 class="text-5xl font-bold fade-in">SELAMAT DATANG DI HIMAKOM</h1>
        <button onclick="document.getElementById('tentang-kami').scrollIntoView({ behavior: 'smooth' })" class="mt-4 px-6 py-3 bg-purple-800 rounded-lg text-white">Explore</button>
        <div class="absolute bottom-4 flex space-x-4">
            <a href="#" class="text-2xl"><i class="fab fa-facebook"></i></a>
            <a href="#" class="text-2xl"><i class="fab fa-instagram"></i></a>
            <a href="#" class="text-2xl"><i class="fab fa-twitter"></i></a>
            <a href="#" class="text-2xl"><i class="fab fa-linkedin"></i></a>
        </div>
    </div>
</section>

<!-- Tentang Kami -->
<section id="tentang-kami" class="py-20 bg-white">
    <div class="container mx-auto px-6 flex flex-wrap">
        <div class="w-full md:w-1/2">
            <img src="{{ asset('img/pages/home/fototentangkami.png') }}" alt="Tentang Kami" class="w-full object-cover object-center lg:object-top h-96">
        </div>
        <div class="w-full md:w-1/2 flex flex-col justify-center px-6 slide-up">
            <div class="w-1/2 lg:max-h-fit lg:my-0 mx-auto my-3">
                <h1 class="px-5 py-3 text-center bg-gray-300 rounded-full text-md text-slate-700">Tentang kami</h1>
            </div>
            <h2 class="text-md lg:text-3xl font-bold mb-4">Selamat Datang Di HIMAKOM Universitas Pakuan</h2>
            <p class="text-sm mb-4">HIMAKOM (Himpunan Mahasiswa Komputer) adalah organisasi yang dibentuk oleh mahasiswa dan untuk mahasiswa, yang bertujuan untuk membangun jaringan profesional dan mengembangkan keterampilan soft skills.</p>
            <ul class="list-disc text-sm list-inside space-y-2">
                <li>Membangun Pengembangan Akademik</li>
                <li>Membangun Jaringan Profesional</li>
                <li>Mengembangkan Keterampilan Soft Skills</li>
            </ul>
        </div>
    </div>
</section>

<!-- Kenalan Yuk -->
<section id="kenalan-yuk" class="py-20 bg-white">
    <div class="container mx-auto px-6 flex flex-wrap">
        <div class="w-full md:w-1/2">
            <img src="{{ asset('storage/' . $kahim->img) }}" alt="Ketua HIMAKOM" class="w-full h-96 object-cover object-center">
        </div>
        <div class="w-full md:w-1/2 flex flex-col justify-center px-6 slide-up">
            <h2 class="text-3xl font-bold mb-4">Kenalan, Yuk! Ketua HIMAKOM</h2>
            <p class="mb-4">{{ $kahim->bio }}</p>
            <button onclick="window.location.href='{{ url('/ketua') }}'" class="px-6 py-3 bg-purple-800 rounded-lg text-white">Learn More</button>
        </div>
    </div>
</section>

<!-- Berita Terkini -->
<section id="berita" class="py-20 bg-white">
    <div class="container mx-auto px-6">
        <h2 class="text-3xl font-bold mb-8 text-center">Berita & Blog Terbaru</h2>
        <div class="flex flex-wrap -mx-6">
@if ($blogs->count())    
<div class="w-full lg:w-2/3 px-6 mb-6">
    <div class="bg-gray-200 p-6 rounded-lg">
        <img src="{{ asset('storage/' . $blogs[0]->img) }}" alt="News 1" class="h-40 w-full object-cover rounded-lg mb-4">
        <h3 class="text-xl font-bold mb-2">{{ $blogs[0]->title }}</h3>
        <p class="text-gray-600">{{ $blogs[0]->excerpt }} <a href="/artikel/{{ $blogs[0]->slug }}" class="text-sm underline hover:text-slate-500 hover:no-underline">Baca selengkapnya</a></p>
    </div>
</div>
<div class="w-full lg:w-1/3 px-6 mb-6">
    @foreach ($blogs->skip(1)->take(2) as $item)
    <div class="bg-gray-200 p-6 rounded-lg mb-6">
        <img src="{{ asset('storage/' . $item->img) }}" alt="News 2" class="h-40 w-full object-cover rounded-lg mb-4">
        <h3 class="text-xl font-bold mb-2">{{ $item->title }}</h3>
        <p class="text-gray-600">{{ $item->excerpt }} <a href="/artikel/{{ $blogs[0]->slug }}" class="text-sm underline hover:text-slate-500 hover:no-underline">Baca selengkapnya</a></p>
    </div>
    @endforeach
</div>
@endif
        </div>
    </div>
</section>
<x-footer/>

@endsection