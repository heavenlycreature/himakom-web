@extends('components.layout.index-dashboard')

@section('content')
    <div class="flex lg:bg-gray-100 rounded-xl">
        <form class="w-full max-w-full mx-auto p-6 rounded-xl shadow-md" action="{{ route('journal.store') }}" enctype="multipart/form-data" method="POST">
            @csrf
            <div class="grid gap-6 mb-6 md:grid-cols-2">
                <div>
                    <label for="penerbit" class=class="block mb-2 text-sm font-medium @error('penerbit') text-red-700 dark:text-red-500 @else text-gray-900 @enderror">Penerbit</label>
                    <input type="text" name="penerbit" id="penerbit" class="text-sm rounded-lg block w-full p-2.5 @error('penerbit') bg-red-50 border border-red-500 text-red-900 placeholder-red-700 focus:ring-red-500 focus:border-red-500 dark:bg-gray-700 dark:text-red-500 dark:placeholder-red-500 dark:border-red-500 @else bg-gray-50 border border-gray-300 text-gray-900 focus:ring-blue-500 focus:border-blue-500 @enderror"  placeholder="Nama penerbit jurnal" value="{{ old('penerbit') }}"
                    required />
                    @error('penerbit')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500">
                        <span class="font-medium">Oh, shibal!</span> {{ $message }}
                    </p>
                @enderror 
                </div>
                <div>
                    <label for="sumber" class=class="block mb-2 text-sm font-medium @error('sumber') text-red-700 dark:text-red-500 @else text-gray-900 @enderror">Sumber</label>
                    <input 
                    type="text" 
                    id="sumber" 
                    name="sumber" 
                    class="text-sm rounded-lg block w-full p-2.5 @error('sumber') bg-red-50 border border-red-500 text-red-900 placeholder-red-700 focus:ring-red-500 focus:border-red-500 dark:bg-gray-700 dark:text-red-500 dark:placeholder-red-500 dark:border-red-500 @else bg-gray-50 border border-gray-300 text-gray-500 focus:ring-blue-500 focus:border-blue-500 @enderror"  value="{{ old('sumber') }}"
                    placeholder="Asal atau sumber jurnal, contoh: Google Scholar" required />
                    @error('sumber')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500">
                        <span class="font-medium">Oh, shibal!</span> {{ $message }}
                    </p>
                @enderror 
                </div>
                <div>
                    <label for="tujuan" class=class="block mb-2 text-sm font-medium @error('tujuan') text-red-700 dark:text-red-500 @else text-gray-900 @enderror">Tujuan</label>
                    <input 
                    type="text" 
                    id="tujuan"  
                    name="tujuan" 
                    class="text-sm rounded-lg block w-full p-2.5 @error('tujuan') bg-red-50 border border-red-500 text-red-900 placeholder-red-700 focus:ring-red-500 focus:border-red-500 dark:bg-gray-700 dark:text-red-500 dark:placeholder-red-500 dark:border-red-500 @else bg-gray-50 border border-gray-300 text-gray-900 focus:ring-blue-500 focus:border-blue-500 @enderror" 
                    value="{{ old('tujuan') }}"
                    placeholder="Alasan utama penerbitan jurnal, contoh: Analisis pasar global" required />
                    @error('tujuan')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500">
                        <span class="font-medium">Oh, shibal!</span> {{ $message }}
                    </p>
                @enderror 
                </div>  
                <div>
                    <label for="tahun" class=class="block mb-2 text-sm font-medium @error('tahun') text-red-700 dark:text-red-500 @else text-gray-900 @enderror">Tahun</label>
                    <input 
                    type="tel" 
                    id="tahun" 
                    name="tahun" 
                    class="text-sm rounded-lg block w-full p-2.5 @error('tahun') bg-red-50 border border-red-500 text-red-900 placeholder-red-700 focus:ring-red-500 focus:border-red-500 dark:bg-gray-700 dark:text-red-500 dark:placeholder-red-500 dark:border-red-500 @else bg-gray-50 border border-gray-300 text-gray-900 focus:ring-blue-500 focus:border-blue-500 @enderror"
                    value="{{ old('tahun') }}" 
                    placeholder="Tahun penerbitan jurnal, contoh: 2021" 
                    pattern="[0-9]{4}" 
                    required />
                    @error('tahun')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500">
                        <span class="font-medium">Oh, shibal!</span> {{ $message }}
                    </p>
                @enderror 
                </div> 
                <div>
                    <label for="rujuk" class=class="block mb-2 text-sm font-medium @error('rujuk') text-red-700 dark:text-red-500 @else text-gray-900 @enderror">Di rujuk</label>
                    <input 
                    type="number" 
                    id="rujuk" 
                    name="rujuk" 
                    class="text-sm rounded-lg block w-full p-2.5 @error('rujuk') bg-red-50 border border-red-500 text-red-900 placeholder-red-700 focus:ring-red-500 focus:border-red-500 dark:bg-gray-700 dark:text-red-500 dark:placeholder-red-500 dark:border-red-500 @else bg-gray-50 border border-gray-300 text-gray-900 focus:ring-blue-500 focus:border-blue-500 @enderror"
                    placeholder="Jumlah kali jurnal ini dirujuk, contoh: 15" 
                    value="{{ old('rujuk') }}"
                    required />
                    @error('rujuk')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500">
                        <span class="font-medium">Oh, shibal!</span> {{ $message }}
                    </p>
                @enderror 
                </div>               
                <div>
                    <label for="volume" class=class="block mb-2 text-sm font-medium @error('volume') text-red-700 dark:text-red-500 @else text-gray-900 @enderror">Volume</label>
                    <input type="number" 
                    name="volume" 
                    id="volume" 
                    class="text-sm rounded-lg block w-full p-2.5 @error('volume') bg-red-50 border border-red-500 text-red-900 placeholder-red-700 focus:ring-red-500 focus:border-red-500 dark:bg-gray-700 dark:text-red-500 dark:placeholder-red-500 dark:border-red-500 @else bg-gray-50 border border-gray-300 text-gray-900 focus:ring-blue-500 focus:border-blue-500 @enderror" 
                    value="{{ old('volume') }}"
                    placeholder="Volume jurnal, contoh: 42" 
                    required />
                </div>
                @error('volume')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500">
                        <span class="font-medium">Oh, shibal!</span> {{ $message }}
                    </p>
                @enderror 
            </div>
            <div class="mb-6">
                <label for="judul" class="block mb-2 text-sm font-medium @error('judul') text-red-700 dark:text-red-500 @else text-gray-900 @enderror">Judul</label>
                <input 
                type="text" 
                id="judul" 
                name="judul" 
                class="text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  @error('judul') bg-red-50 border border-red-500 text-red-900 placeholder-red-700 focus:ring-red-500 focus:border-red-500 dark:bg-gray-700 dark:text-red-500 dark:placeholder-red-500 dark:border-red-500 @else bg-gray-50 border border-gray-300 text-gray-900 focus:ring-blue-500 focus:border-blue-500 @enderror" 
                placeholder="Judul lengkap jurnal" 
                value="{{ old('judul') }}"
                required />
                @error('judul')
                <p class="mt-2 text-sm text-red-600 dark:text-red-500">
                    <span class="font-medium">Oh, shibal!</span> {{ $message }}
                </p>
                @enderror 
                @error('slug')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500">
                        <span class="font-medium">Oh, shibal!</span> {{ $message }}
                    </p>
                @enderror     
            </div> 
            <div class="mt-6 hidden">     
                <label for="slug" class="block mb-2 text-sm font-medium @error('slug') text-red-700 dark:text-red-500 @else text-gray-700 @enderror">
                    Judul
                </label>
                <input 
                    type="text" 
                    id="slug" 
                    name="slug" 
                    value="{{ old('slug') }}" 
                    class="text-sm rounded-lg block w-full p-2.5 @error('slug') bg-red-50 border border-red-500 text-red-900 placeholder-red-700 focus:ring-red-500 focus:border-red-500 dark:bg-gray-700 dark:text-red-500 dark:placeholder-red-500 dark:border-red-500 @else bg-gray-50 border border-gray-300 text-gray-900 focus:ring-blue-500 focus:border-blue-500 @enderror"  
                    required
                    readonly
                />
            </div> 
{{--         
            <div class="mb-6">            
            <label class="block mb-2 text-sm font-medium @error('pdf') text-red-700 dark:text-red-500 @else text-gray-900 @enderror" for="file_input">Upload file</label>
             <!-- PDF Preview Element -->
             <div id="pdfPreview" class="hidden mb-2 p-2 bg-gray-100 rounded flex items-center justify-between">
                <div class="flex items-center">
                    <svg class="w-8 h-8 mr-2" fill="red" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512">
                        <path d="M181.9 256.1c-5-16-4.9-46.9-2-46.9 8.4 0 7.6 36.9 2 46.9zm-1.7 47.2c-7.7 20.2-17.3 43.3-28.4 62.7 18.3-7 39-17.2 62.9-21.9-12.7-9.6-24.9-23.4-34.5-40.8zM86.1 428.1c0 .8 13.2-5.4 34.9-40.2-6.7 6.3-29.1 24.5-34.9 40.2zM248 160h136v328c0 13.3-10.7 24-24 24H24c-13.3 0-24-10.7-24-24V24C0 10.7 10.7 0 24 0h200v136c0 13.2 10.8 24 24 24zm-8 171.8c-20-12.2-33.3-29-42.7-53.8 4.5-18.5 11.6-46.6 6.2-64.2-4.7-29.4-42.4-26.5-47.8-6.8-5 18.3-.4 44.1 8.1 77-11.6 27.6-28.7 64.6-40.8 85.8-.1 0-.1.1-.2.1-27.1 13.9-73.6 44.5-54.5 68 5.6 6.9 16 10 21.5 10 17.9 0 35.7-18 61.1-61.8 25.8-8.5 54.1-19.1 79-23.2 21.7 11.8 47.1 19.5 64 19.5 29.2 0 31.2-32 19.7-43.4-13.9-13.6-54.3-9.7-73.6-7.2zM377 105L279 7c-4.5-4.5-10.6-7-17-7h-6v128h128v-6.1c0-6.3-2.5-12.4-7-16.9zm-74.1 255.3c4.1-2.7-2.5-11.9-42.8-9 37.1 15.8 42.8 9 42.8 9z"/>
                    </svg>
                    <span id="pdfName" class="text-sm font-medium"></span>
                </div>
                <button type="button" id="removePdf" class="text-red-500 hover:text-red-700">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                    </svg>
                </button>
            </div>
            <input 
            name="pdf" 
            class="block w-full text-sm rounded-lg invalid:text-red-500 invalid:focus:ring-red-500 invalid:focus:border-pink-700 peer  @error('slug') bg-red-50 border border-red-500 text-red-900 placeholder-red-700 focus:ring-red-500 focus:border-red-500 dark:bg-gray-700 dark:text-red-500 dark:placeholder-red-500 dark:border-red-500 @else bg-gray-50 border border-gray-300 text-gray-900 focus:ring-blue-500 focus:border-blue-500 @enderror" 
            id="file_input" 
            type="file"
            accept=".pdf"
            placeholder="Masukan PDF Jurnal"
            value="{{ old('pdf') }}"
            >
            @error('pdf')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500">
                        <span class="font-medium">Oh, shibal!</span> {{ $message }}
                    </p>
            @enderror 
            </div> --}}
            <div class="mb-6">
                <label class="block mb-2 text-sm font-medium @error('pdf') text-red-700 dark:text-red-500 @else text-gray-900 @enderror" for="pdf_url">Masukkan URL PDF</label>
                
                <!-- PDF Preview Element -->
                <div id="pdfPreview" class="hidden mb-2 p-2 bg-gray-100 rounded flex items-center justify-between">
                    <div class="flex items-center">
                        <svg class="w-8 h-8 mr-2" fill="red" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512">
                            <path d="M181.9 256.1c-5-16-4.9-46.9-2-46.9 8.4 0 7.6 36.9 2 46.9zm-1.7 47.2c-7.7 20.2-17.3 43.3-28.4 62.7 18.3-7 39-17.2 62.9-21.9-12.7-9.6-24.9-23.4-34.5-40.8zM86.1 428.1c0 .8 13.2-5.4 34.9-40.2-6.7 6.3-29.1 24.5-34.9 40.2zM248 160h136v328c0 13.3-10.7 24-24 24H24c-13.3 0-24-10.7-24-24V24C0 10.7 10.7 0 24 0h200v136c0 13.2 10.8 24 24 24zm-8 171.8c-20-12.2-33.3-29-42.7-53.8 4.5-18.5 11.6-46.6 6.2-64.2-4.7-29.4-42.4-26.5-47.8-6.8-5 18.3-.4 44.1 8.1 77-11.6 27.6-28.7 64.6-40.8 85.8-.1 0-.1.1-.2.1-27.1 13.9-73.6 44.5-54.5 68 5.6 6.9 16 10 21.5 10 17.9 0 35.7-18 61.1-61.8 25.8-8.5 54.1-19.1 79-23.2 21.7 11.8 47.1 19.5 64 19.5 29.2 0 31.2-32 19.7-43.4-13.9-13.6-54.3-9.7-73.6-7.2zM377 105L279 7c-4.5-4.5-10.6-7-17-7h-6v128h128v-6.1c0-6.3-2.5-12.4-7-16.9zm-74.1 255.3c4.1-2.7-2.5-11.9-42.8-9 37.1 15.8 42.8 9 42.8 9z"/>
                        </svg>
                        <span id="pdfName" class="text-sm font-medium"></span>
                    </div>
                    <button type="button" id="removePdf" class="text-red-500 hover:text-red-700">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                        </svg>
                    </button>
                </div>
             
                <!-- PDF URL Input -->
                <input 
                    name="pdf" 
                    class="block w-full text-sm rounded-lg invalid:text-red-500 invalid:focus:ring-red-500 invalid:focus:border-pink-700 peer @error('pdf_url') bg-red-50 border border-red-500 text-red-900 placeholder-red-700 focus:ring-red-500 focus:border-red-500 dark:bg-gray-700 dark:text-red-500 dark:placeholder-red-500 dark:border-red-500 @else bg-gray-50 border border-gray-300 text-gray-900 focus:ring-blue-500 focus:border-blue-500 @enderror" 
                    id="pdf_url" 
                    type="url"
                    placeholder="Masukkan URL PDF"
                    value="{{ old('pdf_url') }}"
                >
            
                @error('pdf')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500">
                        <span class="font-medium">Oh, shibal!</span> {{ $message }}
                    </p>
                @enderror
            </div>
            <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Submit</button>
        </form>
        
    </div>
    <script>
         const titleInput = document.querySelector('#judul');
        const slugForm = document.querySelector('#slug');

    // making slug
    titleInput.addEventListener('input',async function (){
        const title = titleInput.value.trim();
        const slug = generateSlug(title);
        slugForm.value = slug;
    });
    function generateSlug(title) {
        const slugifiedTitle = title
            .toLowerCase()
            .replace(/\s+/g, '-') // Replace spaces with hyphens
            .replace(/[^a-z0-9-]/g, ''); // Remove all characters except alphanumeric and hyphens

        return slugifiedTitle;
    }

      // PDF preview functionality
    //   const fileInput = document.getElementById('file_input');
    //     const pdfPreview = document.getElementById('pdfPreview');
    //     const pdfName = document.getElementById('pdfName');
    //     const removePdf = document.getElementById('removePdf');

    //     fileInput.addEventListener('change', function(e) {
    //         const file = e.target.files[0];
    //         if (file && file.type === 'application/pdf') {
    //             pdfName.textContent = file.name;
    //             pdfPreview.classList.remove('hidden');
    //         } else {
    //             alert('Please select a PDF file.');
    //             fileInput.value = '';
    //         }
    //     });

    //     removePdf.addEventListener('click', function() {
    //         fileInput.value = '';
    //         pdfPreview.classList.add('hidden');
    //     });

       // PDF URL
       document.getElementById('pdf_url').addEventListener('input', function() {
        const pdfUrl = this.value;
        const pdfPreview = document.getElementById('pdfPreview');
        const pdfName = document.getElementById('pdfName');
        
        if (pdfUrl && pdfUrl.endsWith('.pdf')) {
            pdfPreview.classList.remove('hidden');
            pdfName.textContent = pdfUrl.split('/').pop(); // Menampilkan nama file PDF
        } else {
            pdfPreview.classList.add('hidden');
            pdfName.textContent = '';
        }
    });

    document.getElementById('removePdf').addEventListener('click', function() {
        document.getElementById('pdf_url').value = '';
        const pdfPreview = document.getElementById('pdfPreview');
        pdfPreview.classList.add('hidden');
        document.getElementById('pdfName').textContent = '';
    }); 
    </script>
@endsection