    const mobileMenuButton = document.getElementById('mobile-menu-button');
    const mobileMenu = document.getElementById('mobile-menu');
  
    mobileMenuButton.addEventListener('click', function() {
      // Toggle the 'hidden' class on the mobile menu
      mobileMenu.classList.toggle('lg:hidden');
    });
  
    // Close button functionality
    const closeMenuButton = mobileMenu.querySelector('button');
    closeMenuButton.addEventListener('click', function() {
      mobileMenu.classList.add('hidden');
    });