@extends('components.layout.index')

@section('content')

<x-navbar />
<!-- Main Content -->
<div class="container mx-auto px-6 py-10">
    <!-- Judul Artikel -->
    <h1 class="text-3xl font-bold text-gray-800 mb-6">{{ $blog->title }}</h1>
    
    <!-- Gambar Artikel -->
    <div class="w-full h-64 mb-6">
        <img src="{{ asset('storage/' . $blog->img) }}" alt="Gambar Artikel" class="object-cover h-full w-full">
    </div>
    
    <!-- Paragraf Artikel -->
    <div class="prose prose-lg max-w-none mb-10">
        {!! $blog->description !!}
    </div>
    
    <!-- Informasi Himpunan -->
    <div class="flex items-center mb-10">
        <img src="{{ asset('img/logohimakom.png') }}" alt="Logo Himpunan" class="h-20 w-20 mr-4">
        <div>
            <h3 class="text-xl font-bold text-gray-800">HIMATIKA</h3>
            <p class="text-gray-600">Himpunan Mahasiswa Matematika (HIMATIKA) Universitas Pakuan adalah organisasi mahasiswa yang berfokus pada pengembangan akademik dan keterampilan anggota di bidang matematika. HIMATIKA berperan sebagai wadah bagi mahasiswa untuk memperdalam ilmu matematika melalui berbagai kegiatan seperti seminar, workshop, kompetisi, dan diskusi ilmiah.</p>
        </div>
    </div>
    
    <!-- Daftar Komentar -->
    <div id="commentsSection" class="mb-10">
        <h3 class="text-xl font-bold text-gray-800 mb-4">Comments (0)</h3>
        <div id="commentsList">
            <!-- Komentar akan ditambahkan di sini -->
        </div>
    </div>
    
    <!-- Fitur Komentar -->
    <div class="mb-10">
        <h3 class="text-xl font-bold text-gray-800 mb-4">Leave the Comment</h3>
        <form id="commentForm">
            <textarea id="comment" rows="4" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-800" placeholder="Your Comment"></textarea>
            <input type="text" id="name" class="w-full px-4 py-2 mt-4 border rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-800" placeholder="Your Name">
            <button type="submit" class="px-4 py-2 mt-4 bg-purple-800 text-white rounded-lg">Submit</button>
        </form>
    </div>
</div>

<x-footer/>


<script>
    document.getElementById('commentForm').addEventListener('submit', function(e) {
        e.preventDefault();
        
        // Get comment and name values
        const comment = document.getElementById('comment').value;
        const name = document.getElementById('name').value;
        
        // Validate form fields
        if (comment && name) {
            // Create a new comment element
            const commentElement = document.createElement('div');
            commentElement.className = 'bg-white p-4 rounded-lg shadow mb-4';
            commentElement.innerHTML = `
                <p class="text-gray-800"><strong>${name}</strong></p>
                <p class="text-gray-600">${comment}</p>
            `;
            
            // Append the new comment to the comments list
            document.getElementById('commentsList').appendChild(commentElement);
            
            // Update comment count
            const commentsCount = document.getElementById('commentsList').childElementCount;
            document.getElementById('commentsSection').querySelector('h3').innerText = `Comments (${commentsCount})`;
            
            // Clear form fields
            document.getElementById('comment').value = '';
            document.getElementById('name').value = '';
        } else {
            alert('Please fill in both fields.');
        }
    });
</script>
    
@endsection