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
    const journals = [
        { title: "Pengembangan Metode Neural Networks untuk Prediksi Harga Saham", author: "YD Pristanti", year: 2015, citations: 5, source: "Jurnal STT STIKMA Internasional - Vol. 5", pdf: "jurnal1.blade.php" },
        { title: "Cara menang slot", author: "YD Pristanti", year: 2015, citations: 5, source: "Jurnal STT STIKMA Internasional - Vol. 5", pdf: "jurnal2.blade.php" },
        { title: "Mengembangkan usaha kuliner nasi kucing", author: "YD Pristanti", year: 2015, citations: 5, source: "Jurnal STT STIKMA Internasional - Vol. 5", pdf: "jurnal3.blade.php" },
        { title: "Penggunaan app berbasis html", author: "YD Pristanti", year: 2015, citations: 5, source: "Jurnal STT STIKMA Internasional - Vol. 5", pdf: "jurnal4.blade.php" },
        { title: "Cara membaca rasi bintang dari hp nokia", author: "YD Pristanti", year: 2015, citations: 5, source: "Jurnal STT STIKMA Internasional - Vol. 5", pdf: "jurnal5.blade.php" },
        { title: "Manajemen uang dari pembelian rokok bekas", author: "YD Pristanti", year: 2015, citations: 5, source: "Jurnal STT STIKMA Internasional - Vol. 5", pdf: "jurnal6.blade.php" },
        { title: "Cape bg", author: "YD Pristanti", year: 2015, citations: 5, source: "Jurnal STT STIKMA Internasional - Vol. 5", pdf: "jurnal7.blade.php" },
        // Tambahkan jurnal lagi disini bg
    ];

    let currentPage = 1;
    const itemsPerPage = 6;

    function displayJournals() {
        const journalList = document.getElementById('journalList');
        journalList.innerHTML = '';

        const start = (currentPage - 1) * itemsPerPage;
        const end = start + itemsPerPage;
        const paginatedJournals = journals.slice(start, end);

        paginatedJournals.forEach(journal => {
            const journalItem = `
                <div class="flex justify-between items-center bg-white p-4 rounded-lg shadow-md">
                    <div>
                        <a href="${journal.pdf}" class="text-blue-600 hover:underline text-lg font-semibold">${journal.title}</a>
                        <p class="text-gray-600">${journal.author} · ${journal.year} · Dirujuk ${journal.citations} kali — ${journal.source}</p>
                    </div>
                    <a href="${journal.pdf}" class="px-4 py-2 bg-gray-300 rounded-lg">PDF</a>
                </div>
            `;
            journalList.innerHTML += journalItem;
        });

        displayPagination();
    }

    function displayPagination() {
        const pagination = document.getElementById('pagination');
        pagination.innerHTML = '';

        const totalPages = Math.ceil(journals.length / itemsPerPage);

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
        const filteredJournals = journals.filter(journal => journal.title.toLowerCase().includes(query));
        if (filteredJournals.length === 0) {
            document.getElementById('journalList').innerHTML = '<p class="text-center text-gray-600">Tidak ada jurnal ditemukan</p>';
        } else {
            journals.splice(0, journals.length, ...filteredJournals);
            currentPage = 1;
            displayJournals();
        }
    }

    // Initial display
    displayJournals();
</script>
@endsection