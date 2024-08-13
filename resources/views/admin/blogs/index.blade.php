@extends('components.layout.index-dashboard')

@section('content')
<div class="p-6 bg-white shadow-md rounded-lg">
        <div class="flex justify-between ">
            <h2 class="text-3xl font-bold mb-8">Hallo admin infokom</h2>
            <a href="{{ route('blogs.create') }}" class="px-3 py-2 text-sm lg:text-xl text-white bg-blue-500 rounded-lg">Tambah baru</a>
        </div>
        
        <!-- Search Bar -->
        <div class="relative mb-8">
            <input 
                type="text" 
                id="search-input" 
                class="w-full p-3 border-2 border-blue-600 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" 
                placeholder="Search"
                oninput="filterJournals()"
            />
        </div>
        
        <!-- Journals Table -->
        <div class="overflow-x-auto bg-gray-100 rounded-lg shadow">
            <table class="w-full table-auto">
                <thead class="bg-gray-200 text-gray-700">
                    <tr>
                        <th class="p-4 text-left">Judul</th>
                        <th class="p-4 text-left">Deskripsi</th>
                        <th class="p-4 text-left">Tanggal dibuat</th>
                        <th class="p-4 text-left"></th>
                        <th class="p-4 text-left">Action</th>
                    </tr>
                </thead>
                <tbody id="journal-table" class="bg-white">
                    <!-- Journal rows will be populated here via JS -->
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="flex justify-between items-center mt-6">
            <button id="prev-btn" class="px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600" onclick="prevPage()">Previous</button>
            <span id="pagination-info" class="text-lg"></span>
            <button id="next-btn" class="px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600" onclick="nextPage()">Next</button>
        </div>
    </div>

 
    <script>
    const blogs = @json($blogs);

    let currentPage = 1;
    const itemsPerPage = 10;

    function renderTable() {
        const tableBody = document.getElementById('journal-table');
        tableBody.innerHTML = '';
        
        const filteredBlogs = blogs.slice((currentPage - 1) * itemsPerPage, currentPage * itemsPerPage);
        filteredBlogs.forEach(blog => {
            const row = `<tr class="border-b">
                <td class="p-4">${blog.title}</td>
                <td class="p-4">${blog.excerpt}</td>
                <td class="p-4">${blog.tanggal}</td>
                <td class="p-4"><a class="hover:bg-slate-300 rounded-lg px-3 py-2" href="/dashboard/blogs/${blog.slug}" ><i class="fa-regular fa-eye"></i></a></td>
                <td class="p-4 flex mt-2.5 gap-2.5">
                    <a href="/dashboard/blogs/${blog.slug}/edit" class="block text-blue-500 hover:underline"><i class="fa-regular fa-pen-to-square"></i></a>
                    <form action="/dashboard/blogs/${blog.slug}" method="POST" onsubmit="return confirm('Are you sure you want to delete this item?');">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="text-red-500 hover:underline"><i class="fa-regular fa-trash-can"></i></button>
                    </form>
                </td>
            </tr>`;
            tableBody.innerHTML += row;
        });

        document.getElementById('pagination-info').innerText = `Page ${currentPage} of ${Math.ceil(blogs.length / itemsPerPage)}`;
        document.getElementById('prev-btn').disabled = currentPage === 1;
        document.getElementById('next-btn').disabled = currentPage === Math.ceil(blogs.length / itemsPerPage);
    }

    function nextPage() {
        if (currentPage < Math.ceil(blogs.length / itemsPerPage)) {
            currentPage++;
            renderTable();
        }
    }

    function prevPage() {
        if (currentPage > 1) {
            currentPage--;
            renderTable();
        }
    }

    function filterJournals() {
        const searchQuery = document.getElementById('search-input').value.toLowerCase();
        const filtered = blogs.filter(blog => blog.title.toLowerCase().includes(searchQuery));
        const tableBody = document.getElementById('journal-table');
        tableBody.innerHTML = '';

        filtered.slice(0, itemsPerPage).forEach(blog => {
            const row = `<tr class="border-b">
                <td class="p-4">${blog.title}</td>
                <td class="p-4">${blog.excerpt}</td>
                <td class="p-4">${blog.tanggal}</td>
                <td class="p-4">
                    <button class="text-blue-500 hover:underline"><i class="fa-regular fa-pen-to-square"></i></button>
                    <form action="/dashboard/blogs/${blog.id}" method="POST" onsubmit="return confirm('Are you sure you want to delete this item?');">
                                    @csrf
                                    @method('delete')
                                    <button class="text-red-500 hover:underline"><i class="fa-regular fa-trash-can"></i></button>
                    </form>
                </td>
            </tr>`;
            tableBody.innerHTML += row;
        });

        document.getElementById('pagination-info').innerText = `Showing ${filtered.length} results`;
    }

    document.addEventListener('DOMContentLoaded', renderTable);       
    </script>
@endsection
