<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jelajah Jurnal - HIMAKOM Universitas Pakuan</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="css/index.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100" style="background-image: url('{{ asset('backgroundhalamanjelajah.png') }}'); background-size: cover;">

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

<!-- JavaScript -->
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

</body>
</html>
