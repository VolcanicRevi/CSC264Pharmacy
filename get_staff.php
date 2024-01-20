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

// Fetch staff from the database
$query = "SELECT * FROM staff";
$result = $conn->query($query);

if ($result->num_rows > 0) {
    // Display staff list
    while ($row = $result->fetch_assoc()) {
        echo '<li>' . $row['username'] . '</li>';
    }
} else {
    echo 'No staff found';
}

$conn->close();
?>