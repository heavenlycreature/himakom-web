<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Jurnal - HIMAKOM Universitas Pakuan</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="css/index.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100" style="background-image: url('{{ asset('backgroundhalamanjurnal.jpg') }}'); background-size: cover;">

<!-- Header -->
<header class="bg-white shadow-md">
    <div class="container mx-auto px-6 py-3 flex justify-between items-center">
        <div class="flex items-center">
            <img src="{{ asset('LOGO HIMAKOM') }}" alt="Logo" class="h-10 mr-3">
            <span class="text-lg font-bold text-purple-800">Universitas Pakuan</span>
        </div>
        <nav class="space-x-6">
            <a href="{{ url('/') }}" class="text-gray-600 hover:text-purple-800">Beranda</a>
            <a href="{{ url('/jelajah') }}" class="text-gray-600 hover:text-purple-800">Jelajah</a>
            <a href="{{ url('/berita') }}" class="text-gray-600 hover:text-purple-800">Berita Terkini</a>
            <a href="{{ url('/artikel') }}" class="text-gray-600 hover:text-purple-800">Artikel</a>
            <a href="{{ url('/login') }}" class="px-4 py-2 bg-purple-800 text-white rounded-lg">Login</a>
        </nav>
    </div>
</header>

<!-- Main Content -->
<div class="container mx-auto px-6 py-10 flex justify-center items-center">
    <div class="flex flex-col md:flex-row bg-white rounded-lg shadow-lg overflow-hidden">
        <!-- Box Kiri -->
        <div class="w-full md:w-1/2 h-96">
            <img src="{{ asset('images/jurnal_preview.jpg') }}" alt="Preview Jurnal" class="object-cover h-full w-full">
        </div>
        <!-- Box Kanan -->
        <div class="w-full md:w-1/2 p-6">
            <h1 class="text-2xl font-bold text-gray-800">Pengembangan Metode Neural Networks untuk Menentukan Karakter Seseorang</h1>
            <p class="mt-4 text-gray-600">Tujuan penelitian dalam jurnal ini adalah untuk mengidentifikasi karakteristik seseorang menggunakan metode jaringan syaraf tiruan (Neural Networks) dan untuk mempermudah serta mempercepat pekerjaan sarjana psikologi dalam membaca karakter seseorang dari gambar yang dibuat oleh pasien.</p>
            <button class="mt-6 px-4 py-2 bg-purple-800 text-white rounded-lg">Download</button>
        </div>
    </div>
</div>

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

</body>
</html>
