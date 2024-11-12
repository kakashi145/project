// Function to open the side navigation
function openNav() {
    document.getElementById("mysidenav").style.width = "250px";  // Set the width of the side navigation
    document.getElementById("main").style.marginLeft = "250px";  // Push the main content to the right
}

// Function to close the side navigation
function closeNav() {
    document.getElementById("mysidenav").style.width = "0";  // Reset the side navigation width to 0
    document.getElementById("main").style.marginLeft = "0";  // Reset the margin of the main content
}

// Fetch data from PHP script and initialize the salary component chart
fetch('fetch_salary_data.php')
    .then(response => response.json())
    .then(data => {
        console.log(data);  // Log the fetched data for debugging

        // Extract component names and amounts for the chart
        const labels = data.map(item => item.component_name);
        const amounts = data.map(item => item.amount);

        // Get the canvas element and create a new Chart.js pie chart
        const salaryCtx = document.getElementById('salaryChart').getContext('2d');
        const salaryChart = new Chart(salaryCtx, {
            type: 'pie',
            data: {
                labels: labels,
                datasets: [{
                    data: amounts,
                    backgroundColor: [
                        '#4caf50',  // Basic Salary
                        '#2196f3',  // DA
                        '#ffeb3b',  // HRA
                        '#f44336',  // TA
                        '#9c27b0'   // PA
                    ]
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top',
                    },
                    tooltip: {
                        enabled: true
                    }
                }
            }
        });
    })
    .catch(error => console.error('Error fetching data:', error));
