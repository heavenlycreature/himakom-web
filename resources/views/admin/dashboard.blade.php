@extends('components.layout.index-dashboard')

@section('content')
<div class="flex h-screen bg-gray-100">
    
    <!-- Content -->
    <div class="flex-1 flex flex-col">
        <!-- Header -->
        <header class="flex items-center justify-between bg-white py-4 px-8 shadow-lg">
            <div class="flex items-center">
                <button onclick="toggleSidebar()" class="text-3xl text-purple-800 mr-4">&#9776;</button>
                <input type="text" placeholder="Search" class="bg-gray-200 text-gray-600 rounded-lg px-4 py-2">
            </div>
            <div class="flex items-center">
                <div class="relative mr-4">
                    <button class="text-2xl text-purple-800">&#128276;</button>
                    <div class="absolute top-0 right-0 bg-red-500 text-white rounded-full h-4 w-4 text-xs flex items-center justify-center">3</div>
                </div>
                <div class="relative">
                    <button class="flex items-center focus:outline-none">
                        <img src="{{ asset('img/logo/logo.png') }}" alt="Admin" class="h-10 w-10 rounded-full mr-2">
                        <span class="text-gray-800">ADMIN INFOKOM</span>
                    </button>
                    <div class="absolute right-0 mt-2 bg-white border rounded-lg shadow-lg py-2 hidden">
                        <a href="{{ url('/admininfo') }}" class="block px-4 py-2 text-gray-800 hover:bg-gray-100">Profile</a>
                        <button class="block px-4 py-2 text-gray-800 hover:bg-gray-100">Logout</button>
                    </div>
                </div>
                <div class="ml-4">
                    <select class="bg-gray-200 text-gray-600 rounded-lg px-4 py-2" id="language-select">
                        <option value="id">Indonesia</option>
                        <option value="en">English</option>
                    </select>
                </div>
            </div>
        </header>
        
 <!-- Main Content -->
 <main class="flex-1 p-8">
            <h1 class="text-3xl font-bold mb-8">Hallo admin infokom</h1>
            <div class="bg-white shadow-lg rounded-lg p-8 mb-8">
                <div class="text-center">
                    <img src="{{ asset('img/kahim.png') }}" alt="Ketua HIMAKOM" class="h-32 w-32 mx-auto mb-4">
                    <h2 class="text-2xl font-bold text-purple-800 mb-4">Budi Santoso</h2>
                    <p class="mb-4">Selamat datang di halaman resmi Ketua Himpunan Mahasiswa Komputer (HIMAKOM). Saya Budi Santoso, merasa sangat terhormat untuk bisa memimpin HIMAKOM periode 2024-2025. HIMAKOM adalah wadah bagi mahasiswa jurusan komputer untuk berkumpul, berbagi ilmu, dan berkembang bersama.</p>
                    <div>
                        <button class="bg-teal-500 text-white px-4 py-2 rounded-lg mr-2">Edit</button>
                        <button class="bg-red-500 text-white px-4 py-2 rounded-lg">Delete</button>
                    </div>
                </div>
            </div>

            <h2 class="text-2xl font-bold mb-4">Program kerja</h2>
            <div class="bg-white shadow-lg rounded-lg p-8">
                <div class="flex justify-between items-center mb-4">
                    <h3 class="text-xl font-semibold">Program Kerja</h3>
                    <button class="bg-purple-800 text-white px-4 py-2 rounded-lg">Tambah</button>
                </div>
                <table class="w-full table-auto">
                    <thead>
                        <tr class="bg-gray-200">
                            <th class="px-4 py-2">Judul</th>
                            <th class="px-4 py-2">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="border px-4 py-2">Pengembangan metode neural ..</td>
                            <td class="border px-4 py-2">
                                <button class="bg-teal-500 text-white px-4 py-2 rounded-lg mr-2">Edit</button>
                                <button class="bg-red-500 text-white px-4 py-2 rounded-lg">Delete</button>
                            </td>
                        </tr>
                        <tr>
                            <td class="border px-4 py-2">Pengembangan metode neural ..</td>
                            <td class="border px-4 py-2">
                                <button class="bg-teal-500 text-white px-4 py-2 rounded-lg mr-2">Edit</button>
                                <button class="bg-red-500 text-white px-4 py-2 rounded-lg">Delete</button>
                            </td>
                        </tr>
                        <tr>
                            <td class="border px-4 py-2">Pengembangan metode neural ..</td>
                            <td class="border px-4 py-2">
                                <button class="bg-teal-500 text-white px-4 py-2 rounded-lg mr-2">Edit</button>
                                <button class="bg-red-500 text-white px-4 py-2 rounded-lg">Delete</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </main>
    </div>
</div>

<!-- Tailwind CSS CDN -->
<script src="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.js"></script>

<!-- Custom Script -->
<script>
    function toggleSidebar() {
        const sidebar = document.getElementById('sidebar');
        sidebar.classList.toggle('-translate-x-full');
    }

    document.getElementById('language-select').addEventListener('change', function() {
        var lang = this.value;
        window.location.href = '{{ url("/") }}' + '/' + lang;
    });
</script>
@endsection
