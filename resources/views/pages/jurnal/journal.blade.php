@extends('components.layout.index')

@section('content')  
<x-navbar/>

<!-- Search Bar -->
<div class="container mx-auto px-6 py-10">
    <div class="flex justify-center">
        <input type="text" id="searchBar" class="w-full md:w-1/2 p-3 rounded-lg shadow-md" placeholder="Cari Jurnal/Skripsi" oninput="searchJournal()">
    </div>
</div>

<!-- Jurnal List -->
<div class="container mx-auto px-6">
    <div id="journalList" class="space-y-6">
        <!-- nambah sesuai JavaScript -->
    </div>
</div>

<!-- Pagination -->
<div class="container mx-auto px-6 py-10">
    <div id="pagination" class="flex justify-center space-x-4">
        <!-- nambah sesuai js -->
    </div>
</div>   
<x-footer/>

<script>
    const allJournals = @json($journals); // Keep the original data
    let filteredJournals = [...allJournals]; // Create a copy to work with

    let currentPage = 1;
    const itemsPerPage = 6;

    function displayJournals() {
        const journalList = document.getElementById('journalList');
        journalList.innerHTML = '';

        const start = (currentPage - 1) * itemsPerPage;
        const end = start + itemsPerPage;
        const paginatedJournals = filteredJournals.slice(start, end);

        paginatedJournals.forEach(journal => {
            const journalItem = `
                <div class="flex justify-between items-center bg-white p-4 rounded-lg shadow-md">
                    <div> 
                        <a href="${journal.id}" class="text-blue-600 hover:underline text-lg font-semibold">${journal.title}</a>
                        <p class="text-gray-600">${journal.author} · ${journal.year} · Dirujuk ${journal.citations} kali — ${journal.source}</p>
                    </div>
                    <a href="${journal.pdf}" target="_blank" class="px-4 py-2 bg-gray-300 rounded-lg">PDF</a>
                </div>
            `;
            journalList.innerHTML += journalItem;
        });

        displayPagination();
    }

    function displayPagination() {
        const pagination = document.getElementById('pagination');
        pagination.innerHTML = '';

        const totalPages = Math.ceil(filteredJournals.length / itemsPerPage);

        for (let i = 1; i <= totalPages; i++) {
            const pageButton = document.createElement('button');
            pageButton.textContent = i;
            pageButton.classList.add('px-3', 'py-2', 'rounded-lg', 'bg-white', 'shadow-md', 'hover:bg-gray-200');
            if (i === currentPage) {
                pageButton.classList.remove('bg-white')
                pageButton.classList.add('bg-purple-800', 'text-white');
            }
            pageButton.addEventListener('click', () => {
                currentPage = i;
                displayJournals();
            });
            pagination.appendChild(pageButton);
        }
    }

    function searchJournal() {
        const query = document.getElementById('searchBar').value.toLowerCase();
        if (query === '') {
            filteredJournals = [...allJournals]; // Reset to all journals if search is empty
        } else {
            filteredJournals = allJournals.filter(journal => journal.title.toLowerCase().includes(query));
        }
        
        if (filteredJournals.length === 0) {
            document.getElementById('journalList').innerHTML = '<p class="text-center text-gray-600">Tidak ada jurnal ditemukan</p>';
            document.getElementById('pagination').innerHTML = '';
        } else {
            currentPage = 1;
            displayJournals();
        }
    }

    // Initial display
    displayJournals();
</script>
@endsection