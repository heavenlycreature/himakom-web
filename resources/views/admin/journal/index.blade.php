@extends('components.layout.index-dashboard')

@section('content')
    <div class="p-6 bg-white shadow-md rounded-lg">
        <h2 class="text-3xl font-bold mb-8">Hallo admin infokom</h2>
        
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
                        <th class="p-4 text-left">Penerbit</th>
                        <th class="p-4 text-left">Tahun</th>
                        <th class="p-4 text-left">Sumber</th>
                        <th class="p-4 text-left">Actions</th>
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
        // Sample Data (25 Journals)
        const journals = [
            { judul: "Vancouver", penerbit: "Vancouver", tahun: 2021, sumber: "Vancouver" },
            { judul: "Bangalore", penerbit: "Bangalore", tahun: 2019, sumber: "Bangalore" },
            { judul: "Toronto", penerbit: "Toronto", tahun: 2020, sumber: "Toronto" },
            { judul: "Melbourne", penerbit: "Melbourne", tahun: 2018, sumber: "Melbourne" },
            { judul: "Singapore", penerbit: "Singapore", tahun: 2022, sumber: "Singapore" },
            { judul: "Sydney", penerbit: "Sydney", tahun: 2021, sumber: "Sydney" },
            { judul: "New York", penerbit: "New York", tahun: 2019, sumber: "New York" },
            { judul: "London", penerbit: "London", tahun: 2020, sumber: "London" },
            { judul: "Paris", penerbit: "Paris", tahun: 2021, sumber: "Paris" },
            { judul: "Berlin", penerbit: "Berlin", tahun: 2019, sumber: "Berlin" },
            { judul: "Tokyo", penerbit: "Tokyo", tahun: 2020, sumber: "Tokyo" },
            { judul: "Seoul", penerbit: "Seoul", tahun: 2018, sumber: "Seoul" },
            { judul: "Beijing", penerbit: "Beijing", tahun: 2022, sumber: "Beijing" },
            { judul: "Shanghai", penerbit: "Shanghai", tahun: 2021, sumber: "Shanghai" },
            { judul: "Moscow", penerbit: "Moscow", tahun: 2020, sumber: "Moscow" },
            { judul: "Rome", penerbit: "Rome", tahun: 2019, sumber: "Rome" },
            { judul: "Madrid", penerbit: "Madrid", tahun: 2020, sumber: "Madrid" },
            { judul: "Lisbon", penerbit: "Lisbon", tahun: 2021, sumber: "Lisbon" },
            { judul: "Dublin", penerbit: "Dublin", tahun: 2019, sumber: "Dublin" },
            { judul: "Copenhagen", penerbit: "Copenhagen", tahun: 2020, sumber: "Copenhagen" },
            { judul: "Stockholm", penerbit: "Stockholm", tahun: 2021, sumber: "Stockholm" },
            { judul: "Oslo", penerbit: "Oslo", tahun: 2019, sumber: "Oslo" },
            { judul: "Helsinki", penerbit: "Helsinki", tahun: 2020, sumber: "Helsinki" },
            { judul: "Vienna", penerbit: "Vienna", tahun: 2021, sumber: "Vienna" },
            { judul: "Zurich", penerbit: "Zurich", tahun: 2019, sumber: "Zurich" }
        ];

        let currentPage = 1;
        const itemsPerPage = 10;

        function renderTable() {
            const tableBody = document.getElementById('journal-table');
            tableBody.innerHTML = '';
            
            const filteredJournals = journals.slice((currentPage - 1) * itemsPerPage, currentPage * itemsPerPage);
            filteredJournals.forEach(journal => {
                const row = `<tr class="border-b">
                    <td class="p-4">${journal.judul}</td>
                    <td class="p-4">${journal.penerbit}</td>
                    <td class="p-4">${journal.tahun}</td>
                    <td class="p-4">${journal.sumber}</td>
                    <td class="p-4">
                        <button class="text-blue-500 hover:underline">Edit</button>
                        <button class="text-red-500 hover:underline">Delete</button>
                    </td>
                </tr>`;
                tableBody.innerHTML += row;
            });

            document.getElementById('pagination-info').innerText = `Page ${currentPage} of ${Math.ceil(journals.length / itemsPerPage)}`;
            document.getElementById('prev-btn').disabled = currentPage === 1;
            document.getElementById('next-btn').disabled = currentPage === Math.ceil(journals.length / itemsPerPage);
        }

        function nextPage() {
            if (currentPage < Math.ceil(journals.length / itemsPerPage)) {
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
            const filtered = journals.filter(journal => journal.judul.toLowerCase().includes(searchQuery));
            const tableBody = document.getElementById('journal-table');
            tableBody.innerHTML = '';

            filtered.slice(0, itemsPerPage).forEach(journal => {
                const row = `<tr class="border-b">
                    <td class="p-4">${journal.judul}</td>
                    <td class="p-4">${journal.penerbit}</td>
                    <td class="p-4">${journal.tahun}</td>
                    <td class="p-4">${journal.sumber}</td>
                    <td class="p-4">
                        <button class="text-blue-500 hover:underline">Edit</button>
                        <button class="text-red-500 hover:underline">Delete</button>
                    </td>
                </tr>`;
                tableBody.innerHTML += row;
            });

            document.getElementById('pagination-info').innerText = `Showing ${filtered.length} results`;
        }

        document.addEventListener('DOMContentLoaded', renderTable);
    </script>
@endsection
