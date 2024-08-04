<header class="fixed z-[99] w-full bg-white">
    <nav class="mx-auto flex max-w-7xl items-center justify-between p-6 lg:px-8" aria-label="Global">
      <div class="flex gap-2 lg:flex-1">
        <a href="#" class="-m-1.5 p-1.5">
          <span class="sr-only">Your Company</span>
          <img class="h-8 w-auto" src="{{ asset('img/logo/logo.png') }}" alt="">
        </a>
        <h1 class="text-md lg:text-xl">Universitas Pakuan</h1>
      </div>
     
      <div class="flex lg:hidden">
        <button type="button" class=" mobile-menu-button -m-2.5 inline-flex items-center justify-center rounded-md p-2.5 text-gray-700">
          <span class="sr-only">Open main menu</span>
          <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
          </svg>
        </button>
      </div>
      <div class="hidden lg:flex lg:gap-x-12 lg:flex-1 lg:justify-end">
        <x-navlink href='/' :active="request()->routeIs('beranda')">
          Beranda
        </x-navlink>
        <x-navlink href='/tentang' :active="request()->routeIs('tentang')">
          Tentang
        </x-navlink>
        <x-navlink href='/jurnal' :active="request()->routeIs('jurnal')">
          Jurnal
        </x-navlink>
        <x-navlink href='/artikel' :active="request()->routeIs('artikel')">
          Artikel
        </x-navlink>
        @auth
        <x-navlink href="{{ route('dashboard') }}" class="text-sm px-3 py-2 rounded-md hover:bg-blue-600  bg-blue-400 font-semibold leading-6 text-white">Dashboard</x-navlink>   
        @else
        <x-navlink href="{{ route('login') }}" class="text-sm px-3 py-2 rounded-md hover:bg-blue-600  bg-blue-400 font-semibold leading-6 text-white">Login</x-navlink>
        @endauth
      </div>
  
    </nav>

    <!-- Mobile menu, show/hide based on menu open state. -->
    <div class=" mobile-menu-backdrop fixed inset-0 bg-gray-600 bg-opacity-75 transition-opacity hidden lg:hidden"></div>
    <div class="mobile-menu hidden lg:hidden transition-all duration-300 ease-in-out transform origin-top fixed inset-0 z-50 bg-white" role="dialog" aria-modal="true">
      <!-- Background backdrop, show/hide based on slide-over state. -->
      <div class="fixed inset-0 z-10"></div>
      <div class="fixed inset-y-0 right-0 z-10 w-full overflow-y-auto bg-white px-6 py-6 sm:max-w-sm sm:ring-1 sm:ring-gray-900/10">
        <div class="flex items-center justify-between">
          <a href="#" class="-m-1.5 p-1.5">
            <span class="sr-only">Universitas Pakuan</span>
            <img class="h-8 w-auto" src="{{ asset('img/logo/logo.png') }}" alt="">
          </a>
          <h1 class="text-md lg:text-xl">Universitas Pakuan</h1>

          <button type="button" class="-m-2.5 rounded-md p-2.5 text-gray-700">
            <span class="sr-only">Close menu</span>
            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
              <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
            </svg>
          </button>
        </div>
        <div class="mt-6 flow-root">
          <div class="-my-6 divide-y divide-gray-500/10">
            <div class="space-y-2 py-6">
              <x-navlink href='/' :active="request()->routeIs('beranda')">
                Beranda
              </x-navlink>
              <x-navlink href='/tentang' :active="request()->routeIs('tentang')">
                Tentang
              </x-navlink>
              <x-navlink href='/jurnal' :active="request()->routeIs('jurnal')">
                Jurnal
              </x-navlink>
              <x-navlink href='/artikel' :active="request()->routeIs('artikel')">
                Artikel
              </x-navlink>
            </div>
            <div class="py-6">
              @auth
        <x-navlink href="{{ route('dashboard') }}" class="text-sm px-3 py-2 rounded-md hover:bg-blue-600  bg-blue-400 font-semibold leading-6 text-white">Dashboard</x-navlink>   
        @else
        <x-navlink href="{{ route('login') }}" class="text-sm px-3 py-2 rounded-md hover:bg-blue-600  bg-blue-400 font-semibold leading-6 text-white">Login</x-navlink>
        @endauth
            </div>
          </div>
        </div>
      </div>
      
    </div>
  </header>
 <script>
  document.addEventListener('DOMContentLoaded', function() {

    const mobileMenuButton = document.querySelector('.mobile-menu-button');
    const mobileMenuContainer = document.querySelector('.mobile-menu');
    const mobileMenuBackdrop = document.querySelector('.mobile-menu-backdrop')
  
    function openMenu() {
    mobileMenuBackdrop.classList.remove('hidden');
    mobileMenuContainer.classList.remove('hidden');
    setTimeout(() => {
      mobileMenuBackdrop.classList.remove('opacity-0');
      mobileMenuBackdrop.classList.add('opacity-100');
      mobileMenuContainer.classList.remove('opacity-0', 'scale-95');
      mobileMenuContainer.classList.add('opacity-100', 'scale-100');
    }, 10);
  }
  function closeMenu() {
    mobileMenuBackdrop.classList.remove('opacity-100');
    mobileMenuBackdrop.classList.add('opacity-0');
    mobileMenuContainer.classList.remove('opacity-100', 'scale-100');
    mobileMenuContainer.classList.add('opacity-0', 'scale-95');
    setTimeout(() => {
      mobileMenuBackdrop.classList.add('hidden');
      mobileMenuContainer.classList.add('hidden');
    }, 300);
  }
  mobileMenuButton.addEventListener('click', function() {
    if (mobileMenuContainer.classList.contains('hidden')) {
      openMenu();
    } else {
      closeMenu();
    }
  });

 // Close button functionality
 const closeMenuButton = mobileMenuContainer.querySelector('button');
  closeMenuButton.addEventListener('click', closeMenu);

  // Close menu when clicking on backdrop
  mobileMenuBackdrop.addEventListener('click', closeMenu);
})
  </script>