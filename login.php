<?php
session_start();

$servername = "localhost:3306";
$username = "root"; // default username for phpMyAdmin
$password = ""; // default password for phpMyAdmin
$dbname = "demo"; // replace with your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch data from form
$user = $_POST['username'];
$pass = $_POST['password'];

// SQL query to fetch the user
$sql = "SELECT * FROM registration WHERE username='$user' AND password='$pass'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // User found
    $_SESSION['username'] = $user;
    echo "Login successful. Welcome, " . $user;
    // Redirect to a protected page
    header("Location: protected_page.php");
} else {
    // User not found
    echo "Invalid username or password.";
}

$conn->close();
?>
