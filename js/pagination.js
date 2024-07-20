const rowsPerPage = 100;
let currentPage = 1;
let transactionData = [];

// Fetch the JSON data and initialize the table
fetch('../TerraTech-db/GenerateDummiesData/transactionsummary.json')
    .then(response => response.json())
    .then(data => {
        transactionData = data;
        displayPage(currentPage);
        setupPagination(transactionData.length);
    });

// Function to display the rows for the current page
function displayPage(page, data = transactionData) {
    const start = (page - 1) * rowsPerPage;
    const end = start + rowsPerPage;
    const tableBody = document.querySelector('#transactionTable tbody');
    tableBody.innerHTML = '';

    data.slice(start, end).forEach(transaction => {
        const row = document.createElement('tr');
        row.classList.add('align-middle');
        row.innerHTML = `
            <td>
                <div class="d-flex align-items-center">
                    <div>
                        <div class="h6 mb-0 lh-1">${transaction.TransactionID}</div>
                    </div>
                </div>
            </td>
            <td><span>${transaction.TransactionType}</span></td>
            <td><span>${transaction.PropertyName}</span></td>
            <td><span>${transaction.PropertyAddress}</span></td>
            <td><span>${transaction.AgentName}</span></td>
            <td><span>${transaction.StartDate}</span></td>
            <td><span>${transaction.EndDate}</span></td>
            <td><span>${transaction.DocumentType}</span></td>
            <td class="text-end">
                <div class="dropdown">
                    <a
                        data-bs-toggle="dropdown"
                        href="#"
                        class="btn p-1"
                        aria-expanded="false"
                    >
                        <i class="fa fa-bars" aria-hidden="true"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end">
                        <a href="#!" class="dropdown-item">View Details</a>
                        <a href="#!" class="dropdown-item">Delete transaction</a>
                    </div>
                </div>
            </td>
        `;
        tableBody.appendChild(row);
    });
}

// Function to set up pagination links
function setupPagination(totalItems) {
    const pageCount = Math.ceil(totalItems / rowsPerPage);
    const pagination = document.querySelector('.pagination');
    pagination.innerHTML = '';

    for (let i = 1; i <= pageCount; i++) {
        const pageItem = document.createElement('li');
        pageItem.className = 'page-item';
        pageItem.innerHTML = <a class="page-link">${i}</a>;
        if (i === currentPage) pageItem.classList.add('active');
        pageItem.addEventListener('click', () => {
            currentPage = i;
            displayPage(currentPage);
            document.querySelector('.pagination .active').classList.remove('active');
            pageItem.classList.add('active');
        });
        pagination.appendChild(pageItem);
    }
}

// Add search functionality
document.getElementById('searchInput').addEventListener('keyup', function() {
    const input = this.value.toLowerCase();
    const filteredData = transactionData.filter(transaction =>
        transaction.Name.toLowerCase().includes(input) || transaction.ContactInfo.toLowerCase().includes(input)
    );
    setupPagination(filteredData.length);
    displayPage(1, filteredData);
});
