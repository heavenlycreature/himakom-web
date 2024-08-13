@extends('components.layout.index-dashboard')

@section('content')
<div class="p-6 bg-white shadow-md rounded-lg">
        <div class="flex justify-between ">
            <h2 class="text-3xl font-bold mb-8">Hallo admin infokom</h2>
            <a href="{{ route('journal.create') }}" class="px-3 py-2 text-sm lg:text-xl text-white bg-blue-500 rounded-lg">Tambah baru</a>
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
                        <th class="p-4 text-left">Penerbit</th>
                        <th class="p-4 text-left">Tahun</th>
                        <th class="p-4 text-left">Sumber</th>
                        <th class="p-4 text-left"></th>
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
    <!-- PDF Modal -->
<div id="pdfModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full hidden">
    <div class="relative top-20 mx-auto p-5 border w-11/12 md:w-3/4 lg:w-1/2 shadow-lg rounded-md bg-white">
        <div class="mt-3 text-center">
            <h3 class="text-lg leading-6 font-medium text-gray-900" id="pdfTitle"></h3>
            <div class="mt-2 px-7 py-3">
                <iframe id="pdfViewer" class="w-full hidden md:block" style="height: 70vh;"></iframe>
                <a id="pdfDownload" href="#" class="block md:hidden mt-4 px-4 py-2 bg-blue-500 text-white rounded-md">Download PDF</a>
            </div>
            <div class="items-center px-4 py-3">
                <button id="closeModal" class="px-4 py-2 bg-blue-500 text-white text-base font-medium rounded-md shadow-sm hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-300">
                    Close
                </button>
            </div>
        </div>
    </div>
</div>
    <script>
        // Sample Data (25 Journals)
        const journals = @json($journals);

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
                   <td class="p-4"><a class="hover:bg-slate-300 rounded-lg px-3 py-2" href="#" onclick="openPdfModal('${journal.slug}', '${journal.judul}'); return false;"><i class="fa-regular fa-eye"></i></a></td>
                <td class="p-4 flex mt-2.5 gap-2.5">
                    <a href="/dashboard/journals/${journal.slug}/edit" class="block text-blue-500 hover:underline"><i class="fa-regular fa-pen-to-square"></i></a>
                    <form action="/dashboard/journals/${journal.slug}" method="POST" onsubmit="return confirm('Are you sure you want to delete this item?');">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="text-red-500 hover:underline"><i class="fa-regular fa-trash-can"></i></button>
                    </form>
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
                <td class="p-4"><a class="hover:bg-slate-300 rounded-lg px-3 py-2" href="#" onclick="openPdfModal('${journal.slug}', '${journal.judul}'); return false;"><i class="fa-regular fa-eye"></i></a></td>
                <td class="p-4 flex mt-2.5 gap-2.5">
                    <a href="/dashboard/journals/${journal.slug}/edit" class="block text-blue-500 hover:underline"><i class="fa-regular fa-pen-to-square"></i></a>
                    <form action="/dashboard/journals/${journal.slug}" method="POST" onsubmit="return confirm('Are you sure you want to delete this item?');">
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
    
    // displaying pdf function
    function openPdfModal(slug, title) {
    const modal = document.getElementById('pdfModal');
    const pdfViewer = document.getElementById('pdfViewer');
    const pdfTitle = document.getElementById('pdfTitle');
    const pdfDownload = document.getElementById('pdfDownload');

    const pdfUrl = `/dashboard/journals/${slug}`;
    pdfViewer.src = pdfUrl;
    pdfDownload.href = pdfUrl;
    pdfTitle.textContent = title;
    modal.classList.remove('hidden');
}

function closePdfModal() {
    const modal = document.getElementById('pdfModal');
    const pdfViewer = document.getElementById('pdfViewer');
    
    pdfViewer.src = '';
    modal.classList.add('hidden');
}

document.getElementById('closeModal').addEventListener('click', closePdfModal);
    </script>
@endsection
