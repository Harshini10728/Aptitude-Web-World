<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        nav {
              background-color: rgb(16, 23, 24);
              height: 50px;
              width: 1200px;
              display: flex;
              align-items: center;
              gap: 10px;
          }
          ul {
              list-style-type: none;
              margin: 0;
              padding: 0;
          }
          li {
              display: inline;
              margin-right: 10px;
              position: center;
          }
          a {
              color: white;
              text-decoration: none;
              padding: 0 20px;
              letter-spacing: 0.8px;
              position: relative;
  
          }
          a:hover{
              color: rgb(16, 200, 200);
          }
    </style>
</head>
<body>
<nav>
    <ul>
        <li><a href="login.html">Home</a></li>
        <li><a href="que.html">Quantative</a></li>
        <li><a href="ver.html">Verbal</a></li>
        <li><a href="rea.html">Reaoning</a></li>
    </ul>
</nav>
<center>
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
    $servername = "localhost";
    $username = "root";
    $password_db = ""; // Changed variable name to avoid conflict with $password from form
    $dbname = "demo";

    // Create connection
    $conn = new mysqli($servername, $username, $password_db, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare SQL insert statement
    $sql = "INSERT INTO users (fullname, register_no, department, email, password)
            VALUES ('$fullname', '$register', '$department', '$email', '$password')";

    // Execute SQL statement
    if ($conn->query($sql) === TRUE) {
        echo "***";
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
<h1>login successfully</h1>
<h3>Thank you for login</h3>
</center>
</body>
</html>