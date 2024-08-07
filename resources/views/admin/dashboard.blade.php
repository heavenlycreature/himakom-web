@extends('components.layout.index-dashboard')

@section('content')
<div class="flex lg:bg-gray-100 rounded-xl">
<div class="flex-1 flex flex-col">  
 <!-- Main Content -->
 <main class="flex-1 justify-center p-8">
            <h1 class="text-3xl font-bold mb-8">Hallo admin {{ $name }}</h1>
            <div class="bg-white place-self-center shadow-lg rounded-lg p-8 mb-8">
                <div class="text-center">
                    <img src="
                    {{ $kahim ? asset('storage/' . $kahim->img) : asset('img/kahim.png') }}
                     " alt="Ketua HIMAKOM" class="h-32 object-cover w-32 mx-auto mb-4">
                    <h2 class="text-2xl font-bold text-purple-800 mb-4">{{ $kahim ? $kahim->nama : "Budi Santoso" }}</h2>
                    <p class="mb-4 text-sm lg:text-base">{{ $kahim ? $kahim->bio : "Selamat datang di halaman resmi Ketua Himpunan Mahasiswa Komputer (HIMAKOM). Saya Budi Santoso, merasa sangat terhormat untuk bisa memimpin HIMAKOM periode 2024-2025. HIMAKOM adalah wadah bagi mahasiswa jurusan komputer untuk berkumpul, berbagi ilmu, dan berkembang bersama."}}</p>
                    <div>
                        <a href="{{ route('kahim.edit', $kahim->id) }}" class="bg-teal-500 text-white px-4 py-2 rounded-lg mr-2">Edit</a>
                    </div>
                </div>
            </div>

            <h2 class="text-2xl font-bold mb-4">Program kerja</h2>
            <div class="bg-white shadow-lg rounded-lg p-8">
                <div class="flex justify-between items-center mb-4">
                    <h3 class="text-xl font-semibold">Program Kerja</h3>
                    <a href="{{ route('proker.create') }}" class="bg-purple-800 text-white px-4 py-2 rounded-lg">Tambah</a>
                </div>
                <table class="w-full table-auto">
                    <thead>
                        <tr class="bg-gray-200">
                            <th class="px-4 py-2">Judul</th>
                            <th class="px-4 py-2">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($proker as $data)           
                        <tr>
                            <td class="border text-sm lg:text-base px-4 py-2">{{ $data->excerpt }}</td>
                            <td class="border flex px-4 py-2">
                                <a href="{{ route('proker.edit', $data->id) }}" class="bg-teal-500 text-sm lg:text-base text-white px-3 py-2 rounded-lg mr-2">Edit</a>
                                <form action="{{ route('proker.destroy', $data->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this item?');">
                                    @csrf
                                    @method('delete')
                                    <button class="bg-red-500 text-white text-sm lg:text-base px-3 py-2 rounded-lg">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </main>
    </div>
</div>
@endsection
