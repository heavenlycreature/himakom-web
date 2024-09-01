@extends('components.layout.index-dashboard')

@section('content')
<div class="p-6 bg-white shadow-md rounded-lg">
    <h2 class="text-3xl font-bold mb-8">Ubah Password</h2>

    @if(session('error'))
        <div class="mb-4 text-red-500">{{ session('error') }}</div>
    @endif

    @if(session('success'))
        <div class="mb-4 text-green-500">{{ session('success') }}</div>
    @endif

    <!-- Change Password Form -->
    <form method="POST" action="{{ route('profile.updatePassword') }}">
        @csrf
        @method('PATCH')

        <!-- Current Password -->
        <div class="mb-6">
            <label for="current_password" class="block mb-2 text-sm font-medium text-gray-700">Password Lama</label>
            <input type="password" name="current_password" id="current_password" class="p-3 border-2 border-gray-300 rounded-lg w-full" >
            @error('current_password')
                <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
            @enderror
        </div>

        <!-- New Password -->
        <div class="mb-6">
            <label for="new_password" class="block mb-2 text-sm font-medium text-gray-700">Password Baru</label>
            <input type="password" name="new_password" id="new_password" class="p-3 border-2 border-gray-300 rounded-lg w-full" >
            @error('new_password')
                <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
            @enderror
        </div>

        <!-- Confirm New Password -->
        <div class="mb-6">
            <label for="new_password_confirmation" class="block mb-2 text-sm font-medium text-gray-700">Konfirmasi Password Baru</label>
            <input type="password" name="new_password_confirmation" id="new_password_confirmation" class="p-3 border-2 border-gray-300 rounded-lg w-full" >
            @error('new_password_confirmation')
                <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
            @enderror
        </div>

        <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600">
            Ubah Password
        </button>
    </form>
</div>
@endsection
