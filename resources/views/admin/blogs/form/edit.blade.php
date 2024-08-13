@extends('components.layout.index-dashboard')

@section('content')
<div class="flex lg:bg-gray-100 rounded-xl">
    <form class="w-full max-w-full mx-auto p-6 rounded-xl shadow-md" method="POST" action="{{ route('blogs.update', $blogs->slug) }}" enctype="multipart/form-data" >
        @csrf
        @method('PUT')
        <div>
            <label for="title" class="block mb-2 text-sm font-medium @error('title') text-red-700 dark:text-red-500 @else text-gray-700 @enderror">
                Judul
            </label>
            <input 
                type="text" 
                id="title" 
                name="title" 
                value="{{ old('title', $blogs->title) }}" 
                class="text-sm rounded-lg block w-full p-2.5 @error('title') bg-red-50 border border-red-500 text-red-900 placeholder-red-700 focus:ring-red-500 focus:border-red-500 dark:bg-gray-700 dark:text-red-500 dark:placeholder-red-500 dark:border-red-500 @else bg-gray-50 border border-gray-300 text-gray-900 focus:ring-blue-500 focus:border-blue-500 @enderror" 
                placeholder="Menyejahterakan rakyat.." 
                required
            />
            @error('title')
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
                value="{{ old('slug', $blogs->slug) }}" 
                class="text-sm rounded-lg block w-full p-2.5 @error('slug') bg-red-50 border border-red-500 text-red-900 placeholder-red-700 focus:ring-red-500 focus:border-red-500 dark:bg-gray-700 dark:text-red-500 dark:placeholder-red-500 dark:border-red-500 @else bg-gray-50 border border-gray-300 text-gray-900 focus:ring-blue-500 focus:border-blue-500 @enderror"  
                required
                readonly
            />
            @error('slug')
                <p class="mt-2 text-sm text-red-600 dark:text-red-500">
                    <span class="font-medium">Oh, shibal!</span> {{ $message }}
                </p>
            @enderror     
        </div> 
        <div class="mt-6">
            <label class="block mb-2 text-sm font-medium text-gray-900" for="file_input">Upload file</label>
            @if ($blogs->img) 
            <img src="{{ asset('storage/' . $blogs->img) }}" class="img-preview h-auto max-w-lg rounded-lg">
            @else
            <img class="img-preview h-auto max-w-lg rounded-lg hidden">
            @endif
            <input 
            class="text-sm rounded-lg block w-full p-2.5 @error('img') bg-red-50 border border-red-500 text-red-900 placeholder-red-700 focus:ring-red-500 focus:border-red-500 dark:bg-gray-700 dark:text-red-500 dark:placeholder-red-500 dark:border-red-500 @else bg-gray-50 border border-gray-300 text-gray-900 focus:ring-blue-500 focus:border-blue-500 @enderror"  
            aria-describedby="inputImage_help" 
            id="inputImage" 
            type="file" 
            name="img" 
            accept="image/*" 
            onchange="previewImage()" >
        @error('img')
        <p class="mt-1 text-sm text-red-600 dark:text-red-500">
            <span class="font-medium">Oh, shibal!</span> {{ $message }}
        </p>
        @else
        <p class="mt-1 text-sm text-gray-500"  id="inputImage_help">PNG, or JPG(MAX. 800x400px).</p>
        @enderror
        </div>
        <div class="mt-6">
            <label for="description" class="form-label">Deskripsi</label>
            <input id="description" type="hidden" name="description" value="{{ old('description', $blogs->description) }}">
            <trix-editor input="description" class="trix-content"></trix-editor>
            @error('description')
                <p class="mt-2 text-sm text-red-600 dark:text-red-500">
                    <span class="font-medium">Oh, shibal!</span> {{ $message }}
                </p>
            @enderror    
        </div>
    <button type="submit" class="mt-6 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Submit</button>
</form>
</div>
<script>
    const titleInput = document.querySelector('#title');
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
    
    document.addEventListener('trix-file-accept', function(event) {
    // Prevent any file attachments
    event.preventDefault();
});

// Function to customize Trix toolbar and prevent file attachments
function customizeTrix(event) {
    var trix = event.target;
    var toolbarElement = trix.toolbarElement;
    
    // Remove file tools from toolbar
    var fileTools = toolbarElement.querySelector(".trix-button-group--file-tools");
    if (fileTools) {
        fileTools.remove();
    }

    // Ensure list buttons are present
    var blockTools = toolbarElement.querySelector(".trix-button-group--block-tools");
    if (blockTools) {
        if (!blockTools.querySelector('[data-trix-attribute=bullet]')) {
            blockTools.insertAdjacentHTML('beforeend', '<button type="button" class="trix-button trix-button--icon trix-button--icon-bullet-list" data-trix-attribute="bullet" title="Bullet List">Bullet List</button>');
        }
        if (!blockTools.querySelector('[data-trix-attribute=number]')) {
            blockTools.insertAdjacentHTML('beforeend', '<button type="button" class="trix-button trix-button--icon trix-button--icon-number-list" data-trix-attribute="number" title="Number List">Number List</button>');
        }
    }
}

// Customize Trix toolbar
document.addEventListener('trix-initialize', customizeTrix);

    function previewImage(){
    const img = document.querySelector('#inputImage');
    const imgPreview = document.querySelector('.img-preview');

    imgPreview.style.display = 'block';

    const ofReader = new FileReader();
    ofReader.readAsDataURL(img.files[0]);
    
    ofReader.onload = function(ofRevent){
        imgPreview.src = ofRevent.target.result;
    }

    }

</script>
@endsection