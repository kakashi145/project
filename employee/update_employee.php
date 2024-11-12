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

// Get the updated employee data from the request body
$input = json_decode(file_get_contents('php://input'), true);

$name = $input['name'];
$department = $input['department'];
$designation = $input['designation'];
$level = $input['level'];
$basic_salary = $input['basic_salary'];
$HRA = $input['HRA'];
$DA = $input['DA'];
$TA = $input['TA'];
$gender = $input['gender'];
$phone_number = $input['phone_number'];

// SQL query to update employee details
$sql = "UPDATE employee SET name=?, department=?, designation=?, level=?, basic_salary=?, HRA=?, DA=?, TA=?, gender=?, phone_number=? WHERE empid=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sssdiddissi", $name, $department, $designation, $level, $basic_salary, $HRA, $DA, $TA, $gender, $phone_number, $empid);
$success = $stmt->execute();

$stmt->close();
$conn->close();

// Return success response
echo json_encode(['success' => $success]);
?>
