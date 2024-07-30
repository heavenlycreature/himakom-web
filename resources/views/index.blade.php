<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HIMAKOM Universitas Pakuan</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">

<!-- Header -->
<header class="bg-white shadow-md">
    <div class="container mx-auto px-6 py-3 flex justify-between items-center">
        <div class="flex items-center">
            <img src="{{ asset('img/logohimakom.png') }}" alt="Logo" class="h-10 mr-3">
            <span class="text-lg font-bold text-purple-800">Universitas Pakuan</span>
        </div>
        <nav class="space-x-6">
            <a href="#" class="text-gray-600 hover:text-purple-800" onclick="document.getElementById('beranda').scrollIntoView({ behavior: 'smooth' })">Beranda</a>
            <a href="{{ url('/jelajah') }}" class="text-gray-600 hover:text-purple-800">Jelajah</a>
            <a href="#" class="text-gray-600 hover:text-purple-800" onclick="document.getElementById('berita').scrollIntoView({ behavior: 'smooth' })">Berita Terkini</a>
            <a href="#" class="text-gray-600 hover:text-purple-800" onclick="document.getElementById('artikel').scrollIntoView({ behavior: 'smooth' })">Artikel</a>
            <a href="{{ url('/login') }}" class="px-4 py-2 bg-purple-800 text-white rounded-lg">Login</a>
        </nav>
    </div>
</header>

<!-- Hero Section -->
<section id="beranda" class="relative h-screen bg-cover bg-center text-white" style="background-image: url('{{ asset('img/backgroundberanda.jpg') }}');">
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
<section id="tentang-kami" class="py-20 bg-white" style="background-image: url('{{ asset('img/backgroundtentangkami.jpg') }}');">
    <div class="container mx-auto px-6 flex flex-wrap">
        <div class="w-full md:w-1/2">
            <img src="{{ asset('img/fototentangkami.png') }}" alt="Tentang Kami" class="w-full object-cover object-center h-96">
        </div>
        <div class="w-full md:w-1/2 flex flex-col justify-center px-6 slide-up">
            <h2 class="text-3xl font-bold mb-4">Selamat Datang Di HIMAKOM Universitas Pakuan</h2>
            <p class="mb-4">HIMAKOM (Himpunan Mahasiswa Komputer) adalah organisasi yang dibentuk oleh mahasiswa dan untuk mahasiswa, yang bertujuan untuk membangun jaringan profesional dan mengembangkan keterampilan soft skills.</p>
            <ul class="list-disc list-inside space-y-2">
                <li>Membangun Pengembangan Akademik</li>
                <li>Membangun Jaringan Profesional</li>
                <li>Mengembangkan Keterampilan Soft Skills</li>
            </ul>
        </div>
    </div>
</section>

<!-- Kenalan Yuk -->
<section id="kenalan-yuk" class="py-20 bg-white" style="background-image: url('{{ asset('img/backgroundindex_kahim.png') }}');">
    <div class="container mx-auto px-6 flex flex-wrap">
        <div class="w-full md:w-1/2">
            <img src="{{ asset('img/kahim.png') }}" alt="Ketua HIMAKOM" class="w-full h-96 object-cover object-center">
        </div>
        <div class="w-full md:w-1/2 flex flex-col justify-center px-6 slide-up">
            <h2 class="text-3xl font-bold mb-4">Kenalan, Yuk! Ketua HIMAKOM</h2>
            <p class="mb-4">Selamat datang di halaman resmi Ketua Himpunan Mahasiswa Komputer (HIMAKOM). Saya Budi Santoso, merasa sangat terhormat untuk memimpin HIMAKOM periode 2024-2025. HIMAKOM adalah wadah bagi mahasiswa jurusan komputer untuk berkumpul, berbagi ilmu, dan berkembang bersama.</p>
            <button onclick="window.location.href='{{ url('/ketua') }}'" class="px-6 py-3 bg-purple-800 rounded-lg text-white">Learn More</button>
        </div>
    </div>
</section>

<!-- Artikel -->
<section id="artikel" class="py-20 bg-white" style="background-image: url('{{ asset('img/backgroundindex_artikel.png') }}');">
    <div class="container mx-auto px-6 text-center">
        <h2 class="text-3xl font-bold mb-8">ARTIKEL</h2>
        <div class="swiper-container">
            <div class="swiper-wrapper">
                <!-- Add your article items here -->
                <div class="swiper-slide bg-gray-200 p-6 rounded-lg">
                    <img src="{{ asset('img/coverartikel&berita.png') }}" alt="Article 1" class="h-40 w-full object-cover rounded-lg mb-4">
                    <h3 class="text-xl font-bold mb-2">Graduation Day</h3>
                    <p class="text-gray-600">Lihat Siapa Saja Mahasiswa Yang Mendapatkan Cumlaude</p>
                </div>
                <div class="swiper-slide bg-gray-200 p-6 rounded-lg">
                    <img src="{{ asset('img/coverartikel&berita.png') }}" alt="Article 2" class="h-40 w-full object-cover rounded-lg mb-4">
                    <h3 class="text-xl font-bold mb-2">Belajar Santai</h3>
                    <p class="text-gray-600">Belajar di Ruang Evos Saja</p>
                </div>
                <!-- Add more article items as needed -->
            </div>
        </div>
    </div>
</section>

<!-- Berita Terkini -->
<section id="berita" class="py-20 bg-white" style="background-image: url('{{ asset('img/backgroundindex_artikel.png') }}');">
    <div class="container mx-auto px-6">
        <h2 class="text-3xl font-bold mb-8 text-center">Berita & Blog Terbaru</h2>
        <div class="flex flex-wrap -mx-6">
            <div class="w-full lg:w-2/3 px-6 mb-6">
                <div class="bg-gray-200 p-6 rounded-lg">
                    <img src="{{ asset('img/coverartikel&berita') }}" alt="News 1" class="h-40 w-full object-cover rounded-lg mb-4">
                    <h3 class="text-xl font-bold mb-2">Belajar Santai</h3>
                    <p class="text-gray-600">Belajar di Ruang Evos Saja</p>
                </div>
            </div>
            <div class="w-full lg:w-1/3 px-6 mb-6">
                <div class="bg-gray-200 p-6 rounded-lg mb-6">
                    <img src="{{ asset('img/coverartikel&berita') }}" alt="News 2" class="h-40 w-full object-cover rounded-lg mb-4">
                    <h3 class="text-xl font-bold mb-2">Tips Cara Bertahan</h3>
                    <p class="text-gray-600">Tips Cara Bertahan Saat Tinggal Di Kampus</p>
                </div>
                <div class="bg-gray-200 p-6 rounded-lg">
                    <img src="{{ asset('img/coverartikel&berita') }}" alt="News 3" class="h-40 w-full object-cover rounded-lg mb-4">
                    <h3 class="text-xl font-bold mb-2">Kamu Harus Tahu</h3>
                    <p class="text-gray-600">Barang Apa Yang Sering Dibawa Oleh Mahasiswa</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Footer -->
<footer class="bg-purple-800 text-white py-10">
    <div class="container mx-auto px-6">
        <div class="flex flex-wrap justify-between">
            <div class="w-full md:w-1/3">
                <h3 class="text-xl font-bold mb-4">Butuh Dukungan Dari Kami?</h3>
                <p>Jangan Ragu, dan Berikan Ideumu Kepada Kami</p>
                <div class="flex mt-4">
                    <input type="email" placeholder="Masukkan emailmu" class="px-4 py-2 rounded-l-lg focus:outline-none">
                    <button class="px-4 py-2 bg-white text-purple-800 rounded-r-lg">Subscribe</button>
                </div>
                <div class="flex space-x-4 mt-4">
                    <a href="#" class="text-2xl"><i class="fab fa-facebook"></i></a>
                    <a href="#" class="text-2xl"><i class="fab fa-instagram"></i></a>
                    <a href="#" class="text-2xl"><i class="fab fa-twitter"></i></a>
                    <a href="#" class="text-2xl"><i class="fab fa-linkedin"></i></a>
                </div>
            </div>
            <div class="w-full md:w-1/3 text-center">
                <img src="{{ asset('images/himakom_logo.png') }}" alt="Logo" class="h-10 mx-auto mb-4">
                <p>&copy; 2024 HIMAKOM Universitas Pakuan</p>
            </div>
            <div class="w-full md:w-1/3 text-right">
                <h3 class="text-xl font-bold mb-4">Come and Say Hello!</h3>
                <p>Jl. Pakuan RT.02/04 Pakuan, Telp: +62 817 213 8859</p>
                <button onclick="window.location.href='https://wa.me/08172138859'" class="px-4 py-2 bg-white text-purple-800 rounded-lg">Contact</button>
            </div>
        </div>
    </div>
</footer>

<!-- Swiper JS -->
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
<script>
    const swiper = new Swiper('.swiper-container', {
        slidesPerView: 3,
        spaceBetween: 30,
        loop: true,
        autoplay: {
            delay: 2500,
            disableOnInteraction: false,
        },
    });
</script>

</body>
</html>
