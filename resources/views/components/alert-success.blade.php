<div id="alert-border-3" class="flex items-center p-4 mb-4 text-green-800 border-t-4 border-green-300 bg-green-50" role="alert">
    <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
      <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
    </svg>
    <div class="ms-3 text-sm font-medium">
      {{ $message }}
    </div>
    <button type="button" class="ms-auto -mx-1.5 -my-1.5 bg-green-50 text-green-500 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 hover:bg-green-200 inline-flex items-center justify-center h-8 w-8"  data-dismiss-target="#alert-border-3" aria-label="Close">
      <span class="sr-only">Dismiss</span>
      <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
      </svg>
    </button>
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