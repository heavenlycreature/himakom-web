<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Artikel - HIMAKOM Universitas Pakuan</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="css/index.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">

<!-- Header -->
<header class="bg-white shadow-md">
    <div class="container mx-auto px-6 py-3 flex justify-between items-center">
        <div class="flex items-center">
            <img src="{{ asset('img/logohimakom.png') }}" alt="Logo" class="h-10 mr-3">
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

<!-- Main Content -->
<div class="container mx-auto px-6 py-10">
    <!-- Judul Artikel -->
    <h1 class="text-3xl font-bold text-gray-800 mb-6">Cara makan sate yang benar</h1>
    
    <!-- Gambar Artikel -->
    <div class="w-full h-64 mb-6">
        <img src="{{ asset('images/coverartikel&berita.png') }}" alt="Gambar Artikel" class="object-cover h-full w-full">
    </div>
    
    <!-- Paragraf Artikel -->
    <div class="prose prose-lg max-w-none mb-10">
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla vitae egestas ex. Vestibulum euismod felis in dui ullamcorper, at consequat ex scelerisque. Integer vitae tincidunt lectus. In hac habitasse platea dictumst. Ut sollicitudin, lectus in ullamcorper consectetur, nunc purus volutpat orci, sed varius enim risus non elit. Curabitur pharetra nec metus non consequat.</p>
        <p>Vivamus elementum ligula ut nisi aliquam, at interdum nisl euismod. Nulla facilisi. Proin fringilla, augue sit amet gravida vehicula, velit lacus tincidunt odio, non consequat turpis sapien vel arcu. Integer porttitor orci sed ligula feugiat, a finibus orci malesuada. Sed congue justo sed lorem bibendum ultricies. Cras eget nunc sit amet leo tristique dignissim. Integer consequat nisl quis lacus dapibus gravida.</p>
        <p>Mauris sit amet nulla elit. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Suspendisse varius sollicitudin orci at scelerisque. Sed dignissim dapibus libero. Nunc sed ultricies tortor. Curabitur quis elementum justo. In pretium turpis ac ligula vestibulum, at condimentum est pharetra. Curabitur in diam et odio bibendum malesuada. Aenean ultricies velit eget felis fermentum, eget bibendum leo iaculis.</p>
        <p>Etiam auctor lorem orci, et cursus odio dignissim et. Integer gravida, metus vitae scelerisque varius, sapien nunc vestibulum sem, nec vehicula nulla risus in purus. Curabitur sit amet sapien velit. Suspendisse potenti. Vivamus fermentum, nunc sed condimentum gravida, nulla ex consectetur odio, et tincidunt enim mi at ligula. Vivamus vel egestas lacus.</p>
        <p>Fusce gravida venenatis felis vel varius. Donec maximus tellus eget dolor tincidunt lacinia. Sed euismod purus in neque varius, in vehicula elit pulvinar. Phasellus scelerisque efficitur ligula non sagittis. Nulla facilisi. Aliquam id pharetra augue, ut tempor turpis. Curabitur aliquam bibendum augue. Ut convallis urna at sapien ullamcorper, et fermentum sem facilisis.</p>
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
                <img src="{{ asset('img/logohimakom.png') }}" alt="Logo" class="h-10 mx-auto mb-4">
                <p>&copy; 2024 HIMAKOM Universitas Pakuan</p>
            </div>
            <div class="w-full md:w-1/3 text-right">
                <h3 class="text-xl font-bold mb-4">Come and Say Hello!</h3>
                <p>Jl. Pakuan RT.02/04 Pakuan, Telp: +62 817-123-456</p>
                <button class="px-4 py-2 mt-4 bg-white text-purple-800 rounded-lg">Contact</button>
            </div>
        </div>
    </div>
</footer>

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

</body>
</html>
