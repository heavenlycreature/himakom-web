@extends('components.layout.index')

@section('content')  
<x-navbar/>
<div class="bg-gray-800 py-24 sm:py-32">
    <div class="mx-auto max-w-7xl px-6 lg:px-8">
        <div class="mx-auto max-w-2xl lg:mx-0">
            <h2 class="text-3xl font-bold tracking-tight text-white sm:text-4xl">Berita Terkini</h2>
            <p class="mt-2 text-base lg:text-lg leading-8 text-gray-300">
          Berita & Blog terbaru yang dapat kamu baca
        </p>
    </div>
    <div class="mx-auto mt-10 grid max-w-2xl grid-cols-1 gap-x-8 gap-y-16 border-t border-gray-200 pt-10 sm:mt-16 sm:pt-16 lg:mx-0 lg:max-w-none lg:grid-cols-3">
    @foreach ($blogs as $blog)
    <x-news-list 
    :title="$blog->title" 
    :slug="$blog->slug" 
    :description="$blog->description" 
    :img="$blog->img" 
    :excerpt="$blog->excerpt" 
    :publish="$blog->formatted_publish"
    loop="{{ $loop->iteration }}"
    />
    @endforeach
    </div>
    </div>
    <div class="flex my-12 justify-center items-center">
        {{ $blogs->links() }}
    </div>
</div>
<x-footer/>
@endsection