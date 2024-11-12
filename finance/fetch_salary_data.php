<?php
// fetch_salary_data.php
header('Content-Type: application/json');

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "salary";

// Connect to the database
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Query to fetch the latest row's values from each component column
$sql = "SELECT basic_salary, DA, HRA, TA, PA FROM employee ORDER BY empid DESC LIMIT 1";  // Assuming `id` or another unique identifier to get the latest row
$result = $conn->query($sql);

$data = [];

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $data[] = ["component_name" => "Basic Salary", "amount" => $row['basic_salary']];
    $data[] = ["component_name" => "DA", "amount" => $row['DA']];
    $data[] = ["component_name" => "HRA", "amount" => $row['HRA']];
    $data[] = ["component_name" => "TA", "amount" => $row['TA']];
    $data[] = ["component_name" => "PA", "amount" => $row['PA']];
}

echo json_encode($data);
$conn->close();
?>
