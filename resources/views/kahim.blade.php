<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ketua HIMAKOM</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
</head>
<body class="bg-white">

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

<!-- Main Content -->
<main>
    <!-- Bagian Ketua Himpunan -->
    <section class="relative" style="background-image: url('img/backgoundhalamankahim.png'); background-size: cover; background-position: center;">
        <div class="container mx-auto flex items-center py-24">
            <div class="bg-transparent p-8 max-w-lg">
                <h1 class="text-4xl text-purple-800 font-bold">Hello, I'm</h1>
                <h2 class="text-5xl text-purple-800 font-extrabold">Budi Santoso</h2>
                <h3 class="text-2xl text-purple-800 font-semibold mb-4">Ketua HIMAKOM</h3>
                <p class="text-white">Selamat datang di halaman resmi Ketua Himpunan Mahasiswa Komputer (HIMAKOM). Saya Budi Santoso, merasa sangat terhormat untuk bisa memimpin HIMAKOM periode 2024-2025. HIMAKOM adalah wadah bagi mahasiswa jurusan komputer untuk berkumpul, berbagi ilmu, dan berkembang bersama.</p>
            </div>
            <div>
                <img src="img/kahim.png" alt="Ketua HIMAKOM" class="h-96">
            </div>
        </div>
    </section>

    <!-- Visi Misi Section -->
    <section class="bg-custom-visi-misi text-black py-20" style="background-image: url('img/backgroundvisimisi.png'); background-size: cover; background-position: center;">
        <div class="container mx-auto flex flex-col md:flex-row items-center px-6">
            <div class="md:w-1/2">
                <img src="{{ asset('img/fotohimpunan.png') }}" alt="Foto Bersama Himpunan" class="rounded">
            </div>
            <div class="md:w-1/2 bg-transparent-box p-8 rounded">
                <h2 class="text-4xl font-bold mb-4">VISI & MISI</h2>
                <p class="mb-4">Menjadikan HIMAKOM sebagai himpunan yang unggul, inovatif, dan berdaya saing, serta menciptakan lingkungan yang kondusif untuk pengembangan diri anggota.</p>
                <ul class="list-disc pl-6">
                    <li>Meningkatkan kualitas kegiatan akademis dan non-akademis untuk mahasiswa.</li>
                    <li>Membuka peluang kolaborasi dengan industri dan institusi terkait.</li>
                    <li>Menyediakan wadah bagi anggota untuk berinovasi dan berkarya.</li>
                    <li>Mendorong terciptanya suasana kekeluargaan dan kebersamaan di HIMAKOM.</li>
                </ul>
            </div>
        </div>
    </section>

    <!-- Bagian Program Kerja -->
    <section class="relative" style="background-image: url('img/backgroundproker.png'); background-size: cover; background-position: center;">
        <div class="container mx-auto py-24">
            <h2 class="text-4xl font-bold text-center text-purple-800 mb-12">Program Kerja</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                <div class="bg-white p-8 rounded-lg shadow-lg text-center">
                    <img src="{{ asset('img/logoproker.png') }}" alt="Logo Proker" class="mx-auto mb-4">
                    <h3 class="text-xl font-semibold text-purple-800 mb-2">Workshop dan Seminar</h3>
                    <p>Mengadakan workshop dan seminar rutin dengan topik terkini di dunia teknologi.</p>
                </div>
                <div class="bg-white p-8 rounded-lg shadow-lg text-center">
                    <img src="{{ asset('img/logoproker.png') }}" alt="Logo Proker" class="mx-auto mb-4">
                    <h3 class="text-xl font-semibold text-purple-800 mb-2">Workshop dan Seminar</h3>
                    <p>Mengadakan workshop dan seminar rutin dengan topik terkini di dunia teknologi.</p>
                </div>
                <div class="bg-white p-8 rounded-lg shadow-lg text-center">
                    <img src="{{ asset('img/logoproker.png') }}" alt="Logo Proker" class="mx-auto mb-4">
                    <h3 class="text-xl font-semibold text-purple-800 mb-2">Workshop dan Seminar</h3>
                    <p>Mengadakan workshop dan seminar rutin dengan topik terkini di dunia teknologi.</p>
                </div>
                <div class="bg-white p-8 rounded-lg shadow-lg text-center">
                    <img src="{{ asset('img/logoproker.png') }}" alt="Logo Proker" class="mx-auto mb-4">
                    <h3 class="text-xl font-semibold text-purple-800 mb-2">Workshop dan Seminar</h3>
                    <p>Mengadakan workshop dan seminar rutin dengan topik terkini di dunia teknologi.</p>
                </div>
            </div>
        </div>
    </section>
</main>

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
                <img src="{{ asset('img/logohimakom.png') }}" alt="Logo" class="h-10 mx-auto mb-4">
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

</body>
</html>
