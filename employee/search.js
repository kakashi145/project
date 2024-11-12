// search.js

function filterTable() {
    // Get the search input value and convert it to lowercase for case-insensitive search
    const searchInput = document.getElementById('searchInput').value.toLowerCase();
    // Get the table rows
    const table = document.querySelector('.table tbody');
    const rows = table.getElementsByTagName('tr');

    // Loop through all table rows
    for (let i = 0; i < rows.length; i++) {
        // Get the name cell from the current row
        const nameCell = rows[i].getElementsByTagName('td')[1]; // Index 1 corresponds to the Name column

        // Check if the name cell exists
        if (nameCell) {
            // Get the text content of the name cell
            const nameText = nameCell.textContent || nameCell.innerText;

            // Check if the name matches the search input
            if (nameText.toLowerCase().indexOf(searchInput) > -1) {
                rows[i].style.display = ''; // Show the row
            } else {
                rows[i].style.display = 'none'; // Hide the row
            }
        }
    }
}
