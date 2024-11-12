<?php
$servername = "localhost"; 
$username = "root"; 
$password = ""; 
$dbname = "salary";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the employee ID from the request
$empid = $_GET['id'];

// SQL query to fetch employee details
$sql = "SELECT empid, name, department, designation, level, basic_salary, HRA, DA, TA, PA, gender, phone_number, HRA_prec, DA_perc FROM employee WHERE empid = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $empid);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $employee = $result->fetch_assoc();
    // Calculate total salary
    $employee['totalSalary'] = $employee['basic_salary'] + $employee['HRA'] + $employee['DA'] + $employee['TA'] + $employee['PA'];
    echo json_encode($employee);
} else {
    echo json_encode([]);
}

$stmt->close();
$conn->close();
?>
