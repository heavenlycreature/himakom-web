@extends('components.layout.index-dashboard')

@section('content')
@include('components.alert')
<div class="p-6 bg-white shadow-md rounded-lg">

    <h2 class="text-3xl font-bold mb-8">Profile</h2>

    <!-- Profile Information -->
    <div class="mb-6">
        <img src="storage/users-profile/{{ auth()->user()->profile }}" alt="">
    </div>
    <div class="mb-6">
        <label class="block mb-2 text-sm font-medium text-gray-700">Nama</label>
        <p class="p-3 border-2 border-gray-300 rounded-lg">{{ auth()->user()->name }}</p>
    </div>

    <div class="mb-6">
        <label class="block mb-2 text-sm font-medium text-gray-700">Username</label>
        <p class="p-3 border-2 border-gray-300 rounded-lg">{{ auth()->user()->username }}</p>
    </div>

    <div class="mb-6">
        <label class="block mb-2 text-sm font-medium text-gray-700">Bio</label>
        <p class="p-3 border-2 border-gray-300 rounded-lg">{{ auth()->user()->bio }}</p>
    </div>

    <div class="mb-6">
        <label class="block mb-2 text-sm font-medium text-gray-700">Role</label>
        <p class="p-3 border-2 border-gray-300 rounded-lg">{{ auth()->user()->role }}</p>
    </div>

    <a href="{{ route('profile.changePassword') }}" class="px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600">
        Ubah Password
    </a>
</div>
@endsection
