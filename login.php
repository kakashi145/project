<?php
// Database credentials
$servername = "localhost";  // For XAMPP, localhost is the default server
$username = "root";         // Default XAMPP username
$password = "";             // Default XAMPP password is empty
$dbname = "salary";         // Your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve the username and password from the login form
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user = $_POST['first'];
    $pass = $_POST['password'];

    // Protect against SQL Injection by using prepared statements
    $stmt = $conn->prepare("SELECT * FROM member WHERE username = ? AND password = ?");
    $stmt->bind_param("ss", $user, $pass);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Redirect to the correct local file path (in URL format)
        header("Location: /mini/home%20page/index.php");  // '%20' is used for space
        exit;
    } else {
        echo "Invalid username or password.";
    }

    $stmt->close();
}

$conn->close();
?>
