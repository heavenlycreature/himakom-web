@extends('components.layout.index-dashboard')

@section('content')
<div class="flex lg:bg-gray-100 rounded-xl">
    <form class="w-full max-w-full mx-auto p-6 rounded-xl shadow-md" method="POST" action="{{ route('users.store') }}" enctype="multipart/form-data">
        @csrf
        <div>
            <label for="name" class="block mb-2 text-sm font-medium @error('name') text-red-700  @else text-gray-700 @enderror">
                Nama
            </label>
            <input 
                type="text" 
                id="name" 
                name="name" 
                value="{{ old('name') }}" 
                class="text-sm rounded-lg block w-full p-2.5 @error('name') bg-red-50 border border-red-500 text-red-900 placeholder-red-700 focus:ring-red-500 focus:border-red-500 @else bg-gray-50 border border-gray-300 text-gray-900 focus:ring-blue-500 focus:border-blue-500 @enderror" 
                placeholder="Nama pengguna..." 
                required
            />
            @error('name')
                <p class="mt-2 text-sm text-red-600 dark:text-red-500">
                    <span class="font-medium">Oh, shibal!</span> {{ $message }}
                </p>
            @enderror
        </div>
        
        <div class="mt-6">
            <label for="username" class="block mb-2 text-sm font-medium @error('username') text-red-700  @else text-gray-700 @enderror">
                Username
            </label>
            <input 
                type="text" 
                id="username" 
                name="username" 
                value="{{ old('username') }}" 
                class="text-sm rounded-lg block w-full p-2.5 @error('username') bg-red-50 border border-red-500 text-red-900 placeholder-red-700 focus:ring-red-500 focus:border-red-500 @else bg-gray-50 border border-gray-300 text-gray-900 focus:ring-blue-500 focus:border-blue-500 @enderror"  
                placeholder="Username pengguna..." 
                required
            />
            @error('username')
                <p class="mt-2 text-sm text-red-600 ">
                    <span class="font-medium">Oh, shibal!</span> {{ $message }}
                </p>
            @enderror
        </div>  

        <div class="mt-6">
            <label for="Bio" class="block mb-2 text-sm font-medium @error('bio') text-red-700  @else text-gray-700 @enderror">
                Bio
            </label>
            <input 
                type="Bio" 
                id="Bio" 
                name="bio" 
                value="{{ old('bio') }}" 
                class="text-sm rounded-lg block w-full p-2.5 @error('Bio') bg-red-50 border border-red-500 text-red-900 placeholder-red-700 focus:ring-red-500 focus:border-red-500 @else bg-gray-50 border border-gray-300 text-gray-900 focus:ring-blue-500 focus:border-blue-500 @enderror"  
                placeholder="Bio..." 
                required
            /> 
            @error('bio')
                <p class="mt-2 text-sm text-red-600 dark:text-red-500">
                    <span class="font-medium">Oh, shibal!</span> {{ $message }}
                </p>
            @enderror
        </div>
        <div class="mt-6">
            <label class="block mb-2 text-sm font-medium text-gray-900" for="file_input">Upload Profile</label>
            <img class="img-preview h-auto max-w-lg rounded-lg hidden">
            <input 
            class="text-sm rounded-lg block w-full p-2.5 @error('img') bg-red-50 border border-red-500 text-red-900 placeholder-red-700 focus:ring-red-500 focus:border-red-500 @else bg-gray-50 border border-gray-300 text-gray-900 focus:ring-blue-500 focus:border-blue-500 @enderror"  
            aria-describedby="inputImage_help" 
            id="inputImage" 
            type="file" 
            name="profile" 
            accept="image/*" 
            onchange="previewImage()" >
        @error('profile')
        <p class="mt-1 text-sm text-red-600 dark:text-red-500">
            <span class="font-medium">Oh, shibal!</span> {{ $message }}
        </p>
        @else
        <p class="mt-1 text-sm text-gray-500"  id="inputImage_help">PNG, or JPG(MAX. 800x400px).</p>
        @enderror
        </div>

        <div class="mt-6">
            <label for="role" class="block mb-2 text-sm font-medium @error('role') text-red-700 @else text-gray-700 @enderror">
                Role
            </label>
            <select 
                id="role" 
                name="role" 
                class="text-sm rounded-lg block w-full p-2.5 @error('role') bg-red-50 border border-red-500 text-red-900 placeholder-red-700 focus:ring-red-500 focus:border-red-500 @else bg-gray-50 border border-gray-300 text-gray-900 focus:ring-blue-500 focus:border-blue-500 @enderror"  
                required>
                <option value="admin"  {{ old('role') == 'admin' ? 'selected' : '' }}>Admin</option>
            </select>   
            @error('role')
                <p class="mt-2 text-sm text-red-600 dark:text-red-500">
                    <span class="font-medium">Oh, shibal!</span> {{ $message }}
                </p>
            @enderror
        </div>

         <!-- Password Input -->
         <div class="mt-6">
            <label for="password" class="block mb-2 text-sm font-medium @error('password') text-red-700  @else text-gray-700 @enderror">
                Password
            </label>
            <input 
                type="password" 
                id="password" 
                name="password" 
                class="text-sm rounded-lg block w-full p-2.5 @error('password') bg-red-50 border border-red-500 text-red-900 placeholder-red-700 focus:ring-red-500 focus:border-red-500 @else bg-gray-50 border border-gray-300 text-gray-900 focus:ring-blue-500 focus:border-blue-500 @enderror"  
                placeholder="Password pengguna..." 
                required
            />
            @error('password')
                <p class="mt-2 text-sm text-red-600 dark:text-red-500">
                    <span class="font-medium">Oh, shibal!</span> {{ $message }}
                </p>
            @enderror
        </div>

        <!-- Confirm Password Input -->
        <div class="mt-6">
            <label for="password_confirmation" class="block mb-2 text-sm font-medium text-gray-700">
                Konfirmasi Password
            </label>
            <input 
                type="password" 
                id="password_confirmation" 
                name="password_confirmation" 
                class="text-sm rounded-lg block w-full p-2.5 bg-gray-50 border border-gray-300 text-gray-900 focus:ring-blue-500 focus:border-blue-500"  
                placeholder="Ulangi password pengguna..." 
                required
            />
        </div>
        
        <button type="submit" class="mt-6 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Submit</button>
    </form>
</div>
<script>
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
