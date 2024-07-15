const rowsPerPage = 15;
let currentPage = 1;
let agentData = [];

// Fetch the JSON data and initialize the table
fetch('json_data/agents.json')
    .then(response => response.json())
    .then(data => {
        agentData = data;
        displayPage(currentPage);
        setupPagination(agentData.length);
    });


// Function to generate a random avatar URL
function getRandomAvatar() {
    const avatarNumber = Math.floor(Math.random() * 8) + 1; // Generates a number between 1 and 5
    return `https://bootdey.com/img/Content/avatar/avatar${avatarNumber}.png`;
}

// Function to display the rows for the current page
function displayPage(page, data = agentData) {
    const start = (page - 1) * rowsPerPage;

    const end = start + rowsPerPage;
    const tableBody = document.querySelector('#agentTable tbody');
    tableBody.innerHTML = '';

    data.slice(start, end).forEach(agent => {
        const row = document.createElement('tr');
        const avatarUrl = getRandomAvatar();
        row.classList.add('align-middle');
        row.innerHTML = `
            <td>
                <div class="d-flex align-items-center">
                    <div>
                        <div class="h6 mb-0 lh-1">   
                        <img src= ${avatarUrl} class="avatar sm rounded-pill me-3 flex-shrink-0" alt="Customer" />
                        ${agent.Name}
                        </div>
                    </div>
                </div>
            </td>
            <td></td>
            <td>
                <a
                    href="/cdn-cgi/l/email-protection"
                    class="__cf_email__"
                    data-cfemail="a5c8d3cac2c0d6e5c0c8c4ccc98bc6cac8"
                >
                    ${agent.ContactInfo}
                </a>
            </td>

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
                        <a href="#!" class="dropdown-item">Delete user</a>
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

    // Define the number of pages to show before and after the current page
    const maxVisiblePages = 5;
    const halfVisiblePages = Math.floor(maxVisiblePages / 2);

    // Add previous button
    const prevPageItem = document.createElement('li');
    prevPageItem.className = `page-item ${currentPage === 1 ? 'disabled' : ''}`;
    prevPageItem.innerHTML = `<a class="page-link">&laquo;</a>`;
    prevPageItem.addEventListener('click', () => {
        if (currentPage > 1) {
            currentPage--;
            displayPage(currentPage);
            setupPagination(totalItems);
        }
    });
    pagination.appendChild(prevPageItem);

    // Add first page and ellipsis if necessary
    if (currentPage > halfVisiblePages + 1) {
        const firstPageItem = document.createElement('li');
        firstPageItem.className = 'page-item';
        firstPageItem.innerHTML = `<a class="page-link">1</a>`;
        firstPageItem.addEventListener('click', () => {
            currentPage = 1;
            displayPage(currentPage);
            setupPagination(totalItems);
        });
        pagination.appendChild(firstPageItem);

        const ellipsisItem = document.createElement('li');
        ellipsisItem.className = 'page-item disabled';
        ellipsisItem.innerHTML = `<a class="page-link">...</a>`;
        pagination.appendChild(ellipsisItem);
    }

    // Add visible page numbers
    for (let i = Math.max(1, currentPage - halfVisiblePages); i <= Math.min(pageCount, currentPage + halfVisiblePages); i++) {
        const pageItem = document.createElement('li');
        pageItem.className = `page-item ${i === currentPage ? 'active' : ''}`;
        pageItem.innerHTML = `<a class="page-link">${i}</a>`;
        pageItem.addEventListener('click', () => {
            currentPage = i;
            displayPage(currentPage);
            setupPagination(totalItems);
        });
        pagination.appendChild(pageItem);
    }

    // Add ellipsis and last page if necessary
    if (currentPage < pageCount - halfVisiblePages) {
        const ellipsisItem = document.createElement('li');
        ellipsisItem.className = 'page-item disabled';
        ellipsisItem.innerHTML = `<a class="page-link">...</a>`;
        pagination.appendChild(ellipsisItem);

        const lastPageItem = document.createElement('li');
        lastPageItem.className = 'page-item';
        lastPageItem.innerHTML = `<a class="page-link">${pageCount}</a>`;
        lastPageItem.addEventListener('click', () => {
            currentPage = pageCount;
            displayPage(currentPage);
            setupPagination(totalItems);
        });
        pagination.appendChild(lastPageItem);
    }

    // Add next button
    const nextPageItem = document.createElement('li');
    nextPageItem.className = `page-item ${currentPage === pageCount ? 'disabled' : ''}`;
    nextPageItem.innerHTML = `<a class="page-link">&raquo;</a>`;
    nextPageItem.addEventListener('click', () => {
        if (currentPage < pageCount) {
            currentPage++;
            displayPage(currentPage);
            setupPagination(totalItems);
        }
    });
    pagination.appendChild(nextPageItem);
}


// Add search functionality
document.getElementById('searchInput').addEventListener('keyup', function() {
    const input = this.value.toLowerCase();
    const filteredData = agentData.filter(agent =>
        agent.Name.toLowerCase().includes(input));
    setupPagination(filteredData.length);
    displayPage(1, filteredData);
});
