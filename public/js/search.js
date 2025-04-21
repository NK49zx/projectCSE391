document.addEventListener('DOMContentLoaded', () => {
    const searchInput = document.querySelector('input[placeholder="Search"]');
    if (!searchInput) return;
    
    //creates search container
    const searchResults = document.createElement('div');
    searchResults.className = 'absolute z-10 bg-white dark:bg-[#1B1833] w-full max-h-60 overflow-y-auto shadow-lg rounded-md mt-1 hidden';
    searchInput.parentNode.appendChild(searchResults);
    
    let searchTimeout;
    
    //displays search results
    const showResults = (questions) => {
        searchResults.innerHTML = questions.length 
            ? questions.map(q => `
                <a href="/question/${q.id}" 
                   class="block p-6 hover:bg-gray-100 dark:hover:bg-[#2A2747] text-gray-800 dark:text-white">
                   ${q.title}
                </a>`).join('')
            : '<div class="p-3 text-gray-500 dark:text-gray-400">No results found</div>';
            
        searchResults.classList.remove('hidden');
    };
    
    //if query len less than 2 hides results
    const handleSearch = (query) => {
        if (query.length < 2) {
            searchResults.innerHTML = '';
            searchResults.classList.add('hidden');
            return;
        }
        
        //otherwise fetches result
        fetch(`/search?query=${encodeURIComponent(query)}`)
            .then(res => res.json())
            .then(data => showResults(data.questions))
            .catch(() => {
                searchResults.innerHTML = '<div class="p-3 text-gray-500">Error occurred while searching</div>';
                searchResults.classList.remove('hidden');
            });
    };
    
    // watches the change in search field, adds a delay to the search result
    searchInput.addEventListener('input', (e) => {
        clearTimeout(searchTimeout);
        searchTimeout = setTimeout(() => handleSearch(e.target.value.trim()), 300);
    });
    
    //hides searchbar on clicking outside the searchbar
    document.addEventListener('click', (e) => {
        if (!searchInput.contains(e.target) && !searchResults.contains(e.target)) {
            searchResults.classList.add('hidden');
        }
    });
    
    //displays the searchbar
    searchInput.addEventListener('focus', () => {
        if (searchInput.value.trim().length >= 2) {
            searchResults.classList.remove('hidden');//if val greater than 2 displays the result
        }
    });
}); 