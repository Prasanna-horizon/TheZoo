<?php
// Database connection parameters
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "admin";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get username and password from the form
    $username = $_POST['username'];
    $password = $_POST['password'];

    // SQL query to fetch admin user from database
    $sql = "SELECT * FROM adminlogin WHERE admin_user='$username' AND admin_pass='$password'";
    $result = $conn->query($sql);

    // Check if result contains one row
    if ($result->num_rows == 1) {
        header("Location: admin_dashboard.php");
    } else {
        // Authentication failed
        echo "Invalid username or password!";
    }
}

// Close database connection
$conn->close();
?>
