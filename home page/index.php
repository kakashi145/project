<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="\mini\styles.css">
    <link rel="stylesheet" href="\mini\commonstyle.css">
    <style>
        /* Add any custom styles here */
    </style>
</head>

<body>
    <div class="top-bar">
        <span class="menu-icon" onclick="openNav()">&#9776;</span>
        <h2>XYZ University</h2>
    </div>
    <div class="container">
        <div id="mysidenav" class="sidenav">
            <a href="" class="closebtn" onclick="closeNav()">&times;</a>
            <a href="\mini\home page\index.php" class="active">Dashboard</a>
            <a href="\mini\finance\finance.html">Finance</a>
            <a href="\mini\employee\employee.php">Employees</a>
            <a href="#">Analysis</a>
            <a href="\mini\promotion\promotion.html">Promotions</a>
        </div>
        <div id="main">
            <div class="content-container" id="content-container">
                <div class="header d-flex justify-content-between">
                    <div class="current-date" style="margin-left: -4px; width: 280px;">
                        <h3>Today</h3>
                        <p id="dateDisplay"></p>
                    </div>
                    <div class="total-employees text-right" style="margin-left: -10px;">
                        <h3>Total Employees</h3>
                        <?php
                        // Database connection parameters
                        $servername = "localhost"; 
                        $username = "root"; 
                        $password = ""; 
                        $dbname = "salary"; 

                        // Create connection
                        $conn = new mysqli($servername, $username, $password, $dbname);

                        // Check connection
                        if ($conn->connect_error) {
                            die("Connection failed: " . $conn->connect_error);
                        }

                        // SQL query to count total employees
                        $countSql = "SELECT COUNT(*) AS total FROM employee";
                        $countResult = $conn->query($countSql);
                        $totalEmployees = $countResult->fetch_assoc()['total'];

                        // SQL queries to count male and female employees
                        $genderSql = "SELECT gender, COUNT(*) as count FROM employee GROUP BY gender";
                        $genderResult = $conn->query($genderSql);

                        $genderCounts = [
                            'Male' => 0,
                            'Female' => 0
                        ];

                        while ($row = $genderResult->fetch_assoc()) {
                            $genderCounts[$row['gender']] = $row['count'];
                        }

                        $conn->close();
                        ?>
                        <p><?php echo $totalEmployees; ?></p>
                    </div>
                </div>
                <div class="content">
                    <div class="employee-status">
                        <h3>Employee Status</h3>
                        <div class="table-responsive" style="max-height: 300px; overflow-y: auto;">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Employee ID</th>
                                        <th>Name</th>
                                        <th>Department</th>
                                        <th>Designation</th>
                                        <th>gender</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    // Re-establish connection to fetch employee details
                                    $conn = new mysqli($servername, $username, $password, $dbname);

                                    // Check connection
                                    if ($conn->connect_error) {
                                        die("Connection failed: " . $conn->connect_error);
                                    }

                                    // SQL query to fetch employee details
                                    $sql = "SELECT empid, name, department, designation, level, basic_salary, HRA, TA, PA, gender, phone_number FROM employee";
                                    $result = $conn->query($sql);

                                    // Prepare table rows
                                    if ($result->num_rows > 0) {
                                        while ($row = $result->fetch_assoc()) {
                                            echo "<tr>
                                                <td>{$row['empid']}</td>
                                                <td>{$row['name']}</td>
                                                <td>{$row['department']}</td>
                                                <td>{$row['designation']}</td>
                                                <td>{$row['gender']}</td>
                                            </tr>";
                                        }
                                    } else {
                                        echo "<tr><td colspan='11'>No employees found</td></tr>";
                                    }

                                    $conn->close();
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="employee-composition">
                        <h3>Employee Composition</h3>
                        <div class="chart">
                            <canvas id="compositionChart"></canvas>
                        </div>
                        <p><?php echo "$totalEmployees employees total"; ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script> <!-- Ensure this is included first -->
    <script>
        // Function to display the current date
        function displayCurrentDate() {
            const today = new Date();
            const options = { year: 'numeric', month: 'long', day: 'numeric' };
            document.getElementById('dateDisplay').innerText = today.toLocaleDateString(undefined, options);
        }
        function openNav() {
    document.getElementById("mysidenav").style.width = "250px";  // Set the width of the side navigation
    document.getElementById("main").style.marginLeft = "250px";  // Push the main content to the right
}

function closeNav() {
    document.getElementById("mysidenav").style.width = "0";  // Reset the side navigation width to 0
    document.getElementById("main").style.marginLeft = "0";  // Reset the margin of the main content
}

        // Call the function to display the date when the page loads
        window.onload = displayCurrentDate;

        // Pass the values fetched from PHP to JavaScript
        const maleCount = <?php echo $genderCounts['Male']; ?>;
        const femaleCount = <?php echo $genderCounts['Female']; ?>;

        const compositionCtx = document.getElementById('compositionChart').getContext('2d');
        const compositionChart = new Chart(compositionCtx, {
            type: 'doughnut',
            data: {
                labels: ['Female', 'Male'],
                datasets: [{
                    data: [femaleCount, maleCount], // Use dynamic values here
                    backgroundColor: ['#ff6384', '#36a2eb']
                }]
            }
        });
    </script>
    
    <script src="index.js"></script>
</body>

</html>
