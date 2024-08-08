@extends('components.layout.index-dashboard')

@section('content')
<div class="flex lg:bg-gray-100 rounded-xl">
    <form class="w-full max-w-full mx-auto p-6 rounded-xl shadow-md" method="POST" action="{{ route('kahim.update', $kahim->id) }}" enctype="multipart/form-data" >
        @csrf
        @method('PUT')
        <div >
            <label for="first_name" class="block mb-2 text-sm font-medium text-gray-700">Nama Lengkap</label>
            <input type="text" value="{{ old('nama', $kahim->nama) }}" id="first_name" name="nama" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="John" required />
        </div>
        <div class="mt-6">            
            <label for="bio" class="block mb-2 text-sm font-medium text-gray-900">Bio</label>
            <textarea id="bio"  name="bio" rows="6" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500" placeholder="Write your thoughts here...">
                {{ old('bio', $kahim->bio) }}
            </textarea>
        </div>  
        <div class="mt-6">
            <label class="block mb-2 text-sm font-medium text-gray-900" for="file_input">Upload file</label>
            @if ($kahim->img)
            <img src="{{ asset( 'storage/' . $kahim->img) }}" class="img-preview h-auto max-w-lg rounded-lg">
            @else
            <img class="img-preview h-auto max-w-lg rounded-lg" style="display: none;">
            @endif
            <input class="block w-full text-sm mt-2 text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 p-1 focus:outline-none" aria-describedby="inputImage_help" id="inputImage" type="file" name="img" accept="image/*" onchange="previewImage()" >
            <p class="mt-1 text-sm text-gray-500"  id="inputImage_help">PNG, or JPG(MAX. 800x400px).</p>
        </div>
        <div class="mt-6">
            <label for="visi-misi" class="form-label">visi-misi</label>
            <input id="visi-misi" type="hidden" name="visi-misi" value="{{ old('visi-misi', $kahim['visi-misi']) }}">
            <trix-editor input="visi-misi" class="trix-content"></trix-editor>
        </div>
    <button type="submit" class="mt-6 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Submit</button>
</form>
</div>
<script>

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

// function to preview the image
function previewImage(){
    const input = document.getElementById('inputImage');
    const imgPreview = document.querySelector('.img-preview');
    if (input.files && input.files[0]) {
        const reader = new FileReader();
        
        reader.onload = function(e) {
            imgPreview.src = e.target.result;
            imgPreview.style.display = 'block';
        };
        
        reader.readAsDataURL(input.files[0]);
    } else {
        imgPreview.src = "";
        imgPreview.style.display = 'none';
    }
}
</script>
@endsection