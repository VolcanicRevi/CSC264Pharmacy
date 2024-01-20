<?php

// Start PHP session at the beginning 
session_start();

// Create database connection using config file
include_once("connPatient.php");

// If form submitted, collect email and password from form
if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Check if a user exists with given username & password
    $result = mysqli_query($conn, "select 'username', 'password' from staff
        where username='$username' and password='$password'");

    // Count the number of user/rows returned by query 
    $user_matched = mysqli_num_rows($result);

    // Check If user matched/exist, store user email in session and redirect to sample page-1
    if ($user_matched > 0) {

        $_SESSION["username"] = $username;
        $_SESSION["password"] = $password;
        header("location: index.php");

    } else {
        echo "Username or password is not matched <br/><br/>";
    }
}

?>