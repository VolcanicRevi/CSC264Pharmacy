<?php
// Assuming you have a database connection
$host = 'localhost:3307';
$username = 'root';
$password = '';
$database = 'pharmacy';

$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve data from the registration form
$username = $_POST['username'];
$password = $_POST['password'];

// Insert new staff into the database
$query = "INSERT INTO staff (username, password) VALUES ('$username', '$password')";
if ($conn->query($query) === TRUE) {
    echo 'success';
} else {
    echo 'Error: ' . $conn->error;
}

$conn->close();
?>