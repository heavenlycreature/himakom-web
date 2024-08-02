@extends('components.layout.index')

@section('content')
<div class="flex bg-error-page bg-cover bg-center justify-center items-center h-screen bg-gray-200">
    <div class="text-center">
        <img class="h-8 w-auto mx-auto my-5" src="{{ asset('img/logo/logo.png') }}" alt="">
        <h1 class=" text-2xl lg:text-4xl text-white font-medium">Oops, Halaman Tidak Ada</h1>
        <p class="text-sm lg:text-xl text-slate-400 font-medium m-6">Sepertinya halaman yang kamu cari sudah pindah atau tidak pernah ada. Kembali ke beranda untuk melanjutkan penelusuran dan kunjungi halaman yang menarik ya!!</p>
        <a href="/" class="bg-slate-200 hover:bg-blue-600 text-black hover:text-white py-2 px-4 rounded"> Beranda</a>
    </div>
</div>
@endsection
