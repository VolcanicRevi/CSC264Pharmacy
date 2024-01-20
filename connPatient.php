<?php
$servername = "localhost:3307";// must be localhost
$username = "root"; //must be root
$password = "";// leave empty
$db = "pharmacy"; // the database's name

// Create connection
$conn = mysqli_connect($servername, $username, $password, $db);

if(!$conn){
    die("Error: ". mysqli_connect_error());

}
else
?>