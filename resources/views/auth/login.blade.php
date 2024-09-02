@extends('components.layout.index')

@section('content')
    
<section class="bg-white">
  <div class="lg:grid lg:min-h-screen lg:grid-cols-12">
            <section class="relative flex h-32 items-end bg-gray-900 lg:col-span-5 lg:h-full xl:col-span-6">
              <img
          alt=""
          src="https://images.unsplash.com/photo-1617195737496-bc30194e3a19?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=870&q=80"
          class="absolute inset-0 h-full w-full object-cover opacity-80"
          />
          
          <div class="hidden lg:relative lg:block lg:p-12">
          <a class="block text-white" href="{{ route('beranda') }}">
              <span class="sr-only">Home</span>
              <img src="{{ asset('img/logo/logo.png') }}" alt="Logo" class="h-8 w-auto sm:h-10" />
        </a>
        
          <h2 class="mt-6 text-2xl font-bold text-white sm:text-3xl md:text-4xl">
            Welcome Back!
          </h2>
            
            <p class="mt-4 leading-relaxed text-white/90">
                Laman ini hanya untuk user yang memiliki kredential khusus sebagai admin!
              </p>
            </div>
    </section>
    
    
    <main class="flex items-center justify-center px-8 py-8 sm:px-12 lg:col-span-7 lg:px-16 lg:py-12 xl:col-span-6">
      <div class="w-full max-w-xl lg:max-w-3xl">
        <div class="relative -mt-16 block lg:hidden">
          <a
          class="inline-flex size-16 items-center justify-center rounded-full bg-white text-blue-600 sm:size-20"
          href="{{ route('beranda') }}"
          >
          <span class="sr-only">Home</span>
          <svg
          class="h-8 sm:h-10"
          viewBox="0 0 28 24"
          fill="none"
          xmlns="http://www.w3.org/2000/svg"
          >
          <img src="{{ asset('img/logo/logo.png') }}" alt="Logo" class="w-auto" />
          </svg>
        </a>

        <h1 class="mt-2 text-2xl font-bold text-gray-900 sm:text-3xl md:text-4xl">
            Welcome Back!
          </h1>
        
        <p class="mt-4 leading-relaxed text-gray-500">
          Laman ini hanya untuk user yang memiliki kredential khusus sebagai admin!
        </p>
      </div>
          <form action="/login" class="mt-8 space-y-6" method="POST">
            @csrf
            <div>
              <label for="username" class="block text-sm font-medium text-gray-700">Username</label>
              <input
                type="text"
                id="username"
                name="username"
                class=" @error('username') mt-1 block w-full rounded-md shadow-sm bg-red-50 border border-red-500 text-red-900 placeholder-red-700 focus:ring-red-500 focus:border-red-500 @else mt-1 block w-full rounded-md shadow-sm border border-gray-300 focus:ring-blue-500 focus:border-blue-500 sm:text-sm @enderror"
                value="{{ old('username') }}"
               
              />
              @error('username')
                <p class="mt-2 text-sm text-red-600 dark:text-red-500">
                    <span class="font-medium">Oh, shibal!</span> {{ $message }}
                </p>
             @enderror
            </div>
      
            <div>
              <label for="Password" class="block text-sm font-medium text-gray-700">Password</label>
              <input
                type="password"
                id="Password"
                name="password"
               class=" @error('username') mt-1 block w-full rounded-md shadow-sm bg-red-50 border border-red-500 text-red-900 placeholder-red-700 focus:ring-red-500 focus:border-red-500 @else mt-1 block w-full rounded-md shadow-sm border border-gray-300 focus:ring-blue-500 focus:border-blue-500 sm:text-sm @enderror"
               
              />
              @error('password')
                <p class="mt-2 text-sm text-red-600 dark:text-red-500">
                    <span class="font-medium">Oh, shibal!</span> {{ $message }}
                </p>
             @enderror
            </div>
      
            <div>
              <button
                type="submit"
                class="flex w-full justify-center rounded-md border border-transparent bg-blue-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2"
              >
                Login
              </button>
            </div>
          </form>
        </div>
      </main>
   </div>
  </section>
  
  @endsection
  
  