<button data-drawer-target="logo-sidebar" data-drawer-toggle="logo-sidebar" aria-controls="logo-sidebar" type="button" class="inline-flex items-center p-2 mt-2 ms-3 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
    <span class="sr-only">Open sidebar</span>
    <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
    <path clip-rule="evenodd" fill-rule="evenodd" d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z"></path>
    </svg>
 </button>
 
 <aside id="logo-sidebar" class="fixed h-full top-0 left-0 z-40 w-64 transition-transform -translate-x-full sm:translate-x-0" aria-label="Sidebar">
    <div class="h-full px-3 py-4 overflow-y-auto bg-gray-50 dark:bg-gray-800">
       <a href="{{ route('beranda') }}" class="flex items-center ps-2.5 mb-5">
          <img src="{{ asset('img/logo/logo.png') }}" class="h-6 me-3 sm:h-7" alt="Flowbite Logo" />
          <span class="self-center text-xl font-semibold whitespace-nowrap dark:text-white">Himakom</span>
       </a>
       <ul class="space-y-2 font-medium">
          <li>
             <a href="{{ route('dashboard') }}" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                <i class="fa-solid fa-user-tie"></i>
                <span class="ms-3">Profile kahim</span>
             </a>
          </li>
          <li>
             <a href="{{ route('journal.index') }}" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
               <i class="fa-solid fa-book"></i>
                <span class="flex-1 ms-3 whitespace-nowrap">Jurnal</span>
             </a>
          </li>
          <li>
             <a href="{{ route('blogs.index') }}" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
               <i class="fa-solid fa-blog"></i>
               <span class="flex-1 ms-3 whitespace-nowrap">Blogs</span>
             </a>
          </li>
          <li>
            <a href="#" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group border-b border-gray-300 dark:border-gray-700">
                <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 18">
                    <path d="M14 2a3.963 3.963 0 0 0-1.4.267 6.439 6.439 0 0 1-1.331 6.638A4 4 0 1 0 14 2Zm1 9h-1.264A6.957 6.957 0 0 1 15 15v2a2.97 2.97 0 0 1-.184 1H19a1 1 0 0 0 1-1v-1a5.006 5.006 0 0 0-5-5ZM6.5 9a4.5 4.5 0 1 0 0-9 4.5 4.5 0 0 0 0 9ZM8 10H5a5.006 5.006 0 0 0-5 5v2a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-2a5.006 5.006 0 0 0-5-5Z"/>
                </svg>
                <span class="flex-1 ms-3 whitespace-nowrap">Users</span>
            </a>
        </li>
          <li> 
            <form method="POST" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group" action={{ route('logout') }}>
                @csrf
                <i class="fa-solid fa-sign-out-alt flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"></i>
                <button type="submit" class="flex-1 text-left ms-3 whitespace-nowrap">Sign Out</button>
            </form>
        </li>        
       </ul>
    </div>
 </aside>
 <script>
    document.addEventListener('DOMContentLoaded', function() {
    const toggleButton = document.querySelector('[data-drawer-target="logo-sidebar"]');
    const sidebar = document.getElementById('logo-sidebar');

    // Function to open the sidebar
    function openSidebar() {
        sidebar.classList.remove('-translate-x-full');
    }

    // Function to close the sidebar
    function closeSidebar() {
        sidebar.classList.add('-translate-x-full');
    }

    // Toggle sidebar when the button is clicked
    toggleButton.addEventListener('click', function(event) {
        event.stopPropagation(); // Prevent this click from being caught by the document listener
        sidebar.classList.toggle('-translate-x-full');
    });

    // Close sidebar when clicking outside of it
    document.addEventListener('click', function(event) {
        const isClickInsideSidebar = sidebar.contains(event.target);
        const isClickOnToggleButton = toggleButton.contains(event.target);

        if (!isClickInsideSidebar && !isClickOnToggleButton && !sidebar.classList.contains('-translate-x-full')) {
            closeSidebar();
        }
    });

    // Prevent clicks inside the sidebar from closing it
    sidebar.addEventListener('click', function(event) {
        event.stopPropagation();
    });
});
 </script>
