@extends('components.layout.index-dashboard')

@section('content')
<div class="flex lg:bg-gray-100 rounded-xl">
    <form class="w-full max-w-full mx-auto p-6 rounded-xl shadow-md" method="POST" action="{{ route('proker.update', $proker->id) }}" >
        @csrf
        @method('PUT')
        <div >
            <label for="first_name" class="block mb-2 text-sm font-medium text-gray-700">Judul</label>
            <input type="text" value="{{ old('judul', $proker->judul) }}" id="first_name" name="judul" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Menyejahterakan rakyat.." required />
        </div>
        <div class="mt-6">            
            <label for="bio" class="block mb-2 text-sm font-medium text-gray-900">Deskripsi</label>
            <textarea id="bio" name="deskripsi" rows="6" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500" placeholder="Write your thoughts here...">{{ old('deskripsi', $proker->deskripsi) }}</textarea>
        </div> 
    <button type="submit" class="mt-6 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Submit</button>
</form>
</div>
@endsection