@extends('components.layout.index-dashboard')

@section('content')
<div class="flex lg:bg-gray-100 rounded-xl">
<div class="flex-1 flex flex-col">  
 <!-- Main Content -->
 <main class="flex-1 justify-center p-8">
    <h1 class="text-3xl font-bold mb-8">Hallo admin {{ $name }}</h1>

            @if (session('success'))       
            <div id="alert-border-3" class="flex items-center p-4 mb-4 text-green-800 border-t-4 border-green-300 bg-green-50" role="alert">
                <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                  <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                </svg>
                <div class="ms-3 text-sm font-medium">
                  {{ session('success') }}
                </div>
                <button type="button" class="ms-auto -mx-1.5 -my-1.5 bg-green-50 text-green-500 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 hover:bg-green-200 inline-flex items-center justify-center h-8 w-8"  data-dismiss-target="#alert-border-3" aria-label="Close">
                  <span class="sr-only">Dismiss</span>
                  <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                  </svg>
                </button>
            </div>
            @endif
            <div class="bg-white place-self-center shadow-lg rounded-lg p-8 mb-8">
                <div class="text-center">
                    <img src="
                    {{ $kahim ? asset('storage/' . $kahim->img) : asset('img/kahim.png') }}
                     " alt="Ketua HIMAKOM" class="h-32 object-cover w-32 mx-auto mb-4">
                    <h2 class="text-2xl font-bold text-purple-800 mb-4">{{ $kahim ? $kahim->nama : "Budi Santoso" }}</h2>
                    <p class="mb-4 text-sm lg:text-base">{{ $kahim ? $kahim->bio : "Selamat datang di halaman resmi Ketua Himpunan Mahasiswa Komputer (HIMAKOM). Saya Budi Santoso, merasa sangat terhormat untuk bisa memimpin HIMAKOM periode 2024-2025. HIMAKOM adalah wadah bagi mahasiswa jurusan komputer untuk berkumpul, berbagi ilmu, dan berkembang bersama."}}</p>
                    <div>
                        <a href="{{ route('kahim.edit', $kahim->id) }}" class="bg-teal-500 text-white px-4 py-2 rounded-lg mr-2">Edit</a>
                    </div>
                  
                </div>
            </div>

            <h2 class="text-2xl font-bold mb-4">Program kerja</h2>
            <div class="bg-white shadow-lg rounded-lg p-8">
                <div class="flex justify-between items-center mb-4">
                    <h3 class="text-xl font-semibold">Program Kerja</h3>
                    <a href="{{ route('proker.create') }}" class="bg-purple-800 text-white px-4 py-2 rounded-lg">Tambah</a>
                </div>
                <table class="w-full table-auto">
                    <thead>
                        <tr class="bg-gray-200">
                            <th class="px-4 py-2">Judul</th>
                            <th class="px-4 py-2">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($proker as $data)           
                        <tr>
                            <td class="border text-sm lg:text-base px-4 py-2">{{ $data->excerpt }}</td>
                            <td class="border flex px-4 py-2">
                                <a href="{{ route('proker.edit', $data->id) }}" class="bg-teal-500 text-sm lg:text-base text-white px-3 py-2 rounded-lg mr-2">Edit</a>
                                <form action="{{ route('proker.destroy', $data->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this item?');">
                                    @csrf
                                    @method('delete')
                                    <button class="bg-red-500 text-white text-sm lg:text-base px-3 py-2 rounded-lg">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </main>
    </div>
</div>
<script>
  // CSS for the fade-out effect
const style = document.createElement('style');
style.textContent = `
  #alert-border-3 {
    transition: opacity 0.5s ease-out;
  }
  #alert-border-3.hiding {
    opacity: 0;
  }
`;
document.head.appendChild(style);

function setupAlertDismissal() {
  const closeButton = document.querySelector('[data-dismiss-target="#alert-border-3"]');
  const alert = document.getElementById('alert-border-3');

  if (closeButton && alert) {
    closeButton.addEventListener('click', function() {
      // Add the 'hiding' class to start the fade-out effect
      alert.classList.add('hiding');
      
      // Remove the alert after the transition is complete
      alert.addEventListener('transitionend', function() {
        alert.remove();
      }, { once: true });
    });
  }
}

// Call the function when the DOM is fully loaded
document.addEventListener('DOMContentLoaded', setupAlertDismissal);
</script>
@endsection
