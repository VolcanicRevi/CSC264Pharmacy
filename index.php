<?php
session_start();

// This page can be accessed only after login
// Redirect user to login page, if username is not available in session
if (!isset($_SESSION["username"] )) {
    header("location : MainMenu.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IF=edge">
    <meta name="viewport"content="width-device-width, initial-scale=1.0">

    <title>TEST</title>

</head>
<style>

    h1{
        text-align: center;
        font-size: 10cm;
       
    }
    form { 

        margin: 0 auto; 
        width: 250px;
        background-color: white;
    
    }

    body {
	min-height: 100vh;
	background: url("image1/Pharmacy.jpg") no-repeat;
	background-size: cover;
	background-position: center;
    }



</style>

<body style="background-color: powderblue">
    <?php include 'Navbar.php' ?>


<div class="container">
    <h1><b> Welcome! Lets Start Our work </b> </h1>
    </div>
</div>

</body>
</html>