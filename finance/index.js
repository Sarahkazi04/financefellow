const searchInput = document.getElementById('searchInput');
const searchResults = document.getElementById('searchResults');

const items = [
    'Finance',
    'Management',
    'financial literacy',
    'Resources',
    'Five Pillars of financial literacy',
    'Assets',
    'Equity',
    'Liability',
    'Mutual Funds',
    'income statement',
    'investors',
    'working capital',
    'income market',
    'bonds',
    'hedge funds',
    'income depriciation',
    'shares of ownership',
    'investments',
    'Authorization'
];

searchInput.addEventListener('input', function() {
    const searchTerm = searchInput.value.toLowerCase();
    const filteredItems = items.filter(item => item.toLowerCase().includes(searchTerm));
    displayResults(filteredItems);
});

function displayResults(results) {
    searchResults.innerHTML = '';
    results.forEach(item => {
        const li = document.createElement('li');
        li.textContent = item;
        searchResults.appendChild(li);
    });
}