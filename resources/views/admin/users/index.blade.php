@extends('components.layout.index-dashboard')

@section('content')
<div class="p-6 bg-white shadow-md rounded-lg">
    
    @if (session('success'))       
    <x-alert-success :message="session('success')"/>
    @endif
    <div class="flex justify-between">
        <h2 class="text-3xl font-bold mb-8">{{ $title }}</h2>
        <a href="{{ route('users.create') }}" class="px-3 py-2 text-sm lg:text-xl text-white bg-blue-500 rounded-lg">Tambah baru</a>
    </div>

    <!-- Search Bar -->
    <div class="relative mb-8">
        <input 
            type="text" 
            id="search-input" 
            class="w-full p-3 border-2 border-blue-600 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" 
            placeholder="Search"
            oninput="filterUsers()"
        />
    </div>

    <!-- Users Table -->
    <div class="overflow-x-auto bg-gray-100 rounded-lg shadow">
        <table class="w-full table-auto">
            <thead class="bg-gray-200 text-gray-700">
                <tr>
                    <th class="p-4">No</th>
                    <th class="p-4 text-left">Nama</th>
                    <th class="p-4 text-left">Username</th>
                    <th class="p-4 text-left">Tanggal Dibuat</th>
                    <th class="p-4 text-left"></th>
                    <th class="p-4 text-left">Action</th>
                </tr>
            </thead>
            <tbody id="user-table" class="bg-white">
                <!-- User rows will be populated here via JS -->
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
const users = @json($users);

let currentPage = 1;
const itemsPerPage = 10;

function renderTable() {
    const tableBody = document.getElementById('user-table');
    tableBody.innerHTML = '';
    const startIndex = (currentPage - 1) * itemsPerPage;

    const filteredUsers = users.slice(startIndex, startIndex + itemsPerPage);
    
    filteredUsers.forEach((user, index) => {
        const row = `<tr class="border-b">
            <td class="p-4">${startIndex + index + 1}</td>
            <td class="p-4">${user.name}</td>
            <td class="p-4">${user.username}</td>
            <td class="p-4">${user.created_at}</td>
            <td class="p-4"></td>
            <td class="p-4 flex mt-2.5 gap-2.5">
                <a href="/dashboard/users/${user.username}/edit" class="block text-blue-500 hover:underline"><i class="fa-regular fa-pen-to-square"></i></a>
                <form action="/dashboard/users/${user.username}" method="POST" onsubmit="return confirm('Are you sure you want to delete this item?');">
                    @csrf
                    @method('delete')
                    <button type="submit" class="text-red-500 hover:underline"><i class="fa-regular fa-trash-can"></i></button>
                </form>
            </td>
        </tr>`;
        tableBody.innerHTML += row;
    });

    document.getElementById('pagination-info').innerText = `Page ${currentPage} of ${Math.ceil(users.length / itemsPerPage)}`;
    document.getElementById('prev-btn').disabled = currentPage === 1;
    document.getElementById('next-btn').disabled = currentPage === Math.ceil(users.length / itemsPerPage);
}

function nextPage() {
    if (currentPage < Math.ceil(users.length / itemsPerPage)) {
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

function filterUsers() {
    const searchQuery = document.getElementById('search-input').value.toLowerCase();
    const filtered = users.filter(user => user.name.toLowerCase().includes(searchQuery));
    const tableBody = document.getElementById('user-table');
    tableBody.innerHTML = '';

    filtered.slice(0, itemsPerPage).forEach((user, index) => {
        const row = `<tr class="border-b">
            <td class="p-4">${index + 1}</td> 
            <td class="p-4">${user.name}</td>
            {{-- <td class="p-4">${user.email}</td> --}} 
            <td class="p-4">${user.username}</td>
            <td class="p-4">${user.created_at}</td>
            <td class="p-4"></td>
            <td class="p-4 flex mt-2.5 gap-2.5">
                <a href="/dashboard/users/${user.username}/edit" class="block text-blue-500 hover:underline"><i class="fa-regular fa-pen-to-square"></i></a>
                <form action="/dashboard/users/${user.username}" method="POST" onsubmit="return confirm('Are you sure you want to delete this item?');">
                    @csrf
                    @method('delete')
                    <button type="submit" class="text-red-500 hover:underline"><i class="fa-regular fa-trash-can"></i></button>
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
