document.addEventListener('DOMContentLoaded', function() {
    const loadingOverlay = document.getElementById('loading-overlay');
    document.addEventListener('click', function(e) {
        const link = e.target.closest('a');
        
        if (link) {
            if (link.target === '_blank' || link.href.includes('#')) {
                return;
            }
            if (link.closest('form')) {
                return;
            }
                        
            // displays the overlay
            loadingOverlay.classList.remove('hidden');
        }
    });
    // if fully loaded, hide the overlay
    window.addEventListener('load', function() {
        loadingOverlay.classList.add('hidden');
    });
    
    // if about to be unloaded, show the overlay
    window.addEventListener('beforeunload', function() {
        loadingOverlay.classList.remove('hidden');
    });
}); 