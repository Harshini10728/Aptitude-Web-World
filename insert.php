<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $fullname = $_POST['fullname'];
    $register = $_POST['register'];
    $department = $_POST['department'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // You can perform additional validation here if needed

    // Connect to your database (replace these with your actual database credentials)
    $servername = "localhost:3306";
    $username = "root";
    $password = "";
    $dbname = "demo";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare SQL insert statement
    $sql = "INSERT INTO users (fullname, register_no, department, email, password)
            VALUES ('$fullname', '$register', '$department', '$email', '$password')";

    // Execute SQL statement
    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close connection
    $conn->close();
} else {
    // If the form is not submitted, redirect back to the form page or do something else
    header("Location: index.html");
    exit();
}
?>
