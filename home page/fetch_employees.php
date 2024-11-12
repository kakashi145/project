<?php
// Database connection parameters
$servername = "localhost"; // Change this if your server is different
$username = "your_username"; // Replace with your database username
$password = "your_password"; // Replace with your database password
$dbname = "salary"; // Your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// SQL query to fetch employee details
$sql = "SELECT empid, name, department, designation, level, basic_salary, HRA, TA, PA, gender, phone_number FROM employee";
$result = $conn->query($sql);

// Prepare HTML table
$tableRows = '';
if ($result->num_rows > 0) {
    // Output data of each row
    while ($row = $result->fetch_assoc()) {
        $tableRows .= "<tr>
            <td>{$row['empid']}</td>
            <td>{$row['name']}</td>
            <td>{$row['department']}</td>
            <td>{$row['designation']}</td>
            <td>{$row['level']}</td>
            <td>{$row['basic_salary']}</td>
            <td>{$row['HRA']}</td>
            <td>{$row['TA']}</td>
            <td>{$row['PA']}</td>
            <td>{$row['gender']}</td>
            <td>{$row['phone_number']}</td>
        </tr>";
    }
} else {
    $tableRows = "<tr><td colspan='11'>No employees found</td></tr>";
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee List</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-4">
        <h2>Employee Details</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Emp ID</th>
                    <th>Name</th>
                    <th>Department</th>
                    <th>Designation</th>
                    <th>Level</th>
                    <th>Basic Salary</th>
                    <th>HRA</th>
                    <th>TA</th>
                    <th>PA</th>
                    <th>Gender</th>
                    <th>Phone Number</th>
                </tr>
            </thead>
            <tbody>
                <?php echo $tableRows; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
