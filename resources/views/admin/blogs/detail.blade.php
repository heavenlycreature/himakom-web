@extends('components.layout.index-dashboard')

@section('content')
<div class="flex my-3 min-h-screen w-full flex-col items-center justify-center ">
    <div class="w-96 md:w-11/12 heading">
        @if ($blogs->img)
        <img src='{{ asset('storage/' . $blogs->img) }}' alt="thumbnail" class="w-full h-44 md:h-64 object-cover object-center rounded-sm" />
        @else
        <img src='{{ asset('img/preveiewjurnal.png') }}' alt="thumbnail" class="w-full h-44 md:h-64 object-cover object-center rounded-sm" />
        @endif
    </div>
    <div class="flex-wrap my-2 w-96 md:w-11/12">
        <h1 class='mt-2 text-xl lg:text-2xl'>{{ $blogs->title }}</h1>   
        <p class='mb-2'>{{ $blogs->formatted_publish }}</p>
    <hr class="border-2 border-gray-500 rounded-lg my-6" />
            {!! $blogs->description !!}
        <a class="mt-5 text-center text-black px-3 py-2 block hover:bg-slate-400 hover:text-white rounded-lg bg-slate-300" href='{{ route('blogs.index') }}'>
        Back
        </a>
    </div>
</div>
@endsection