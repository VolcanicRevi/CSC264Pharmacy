<?php

    session_start();

        //including the database connection file
        include_once("connPatient.php");

        // Check If form submitted, insert user data into database.
        if (isset($_POST['register'])) {
            $email    = $_POST['email'];
            $name     = $_POST['username'];
            $password = $_POST['password'];

            // If email already exists, throw error
            $user_result = mysqli_query($conn, "select 'email' from user where email='$email'");

            // Count the number of row matched 
            $user_matched = mysqli_num_rows($user_result);

            // If number of user rows returned more than 0, it means email already exists
            if ($user_matched > 0) {
                echo "<br/><br/><strong>Error: </strong> User already exists.";
            } else {
                // Insert user data into database
                $result   = mysqli_query($conn, "INSERT INTO user(email,username,password) VALUES('$email','$name','$password')");

                // check if user data inserted successfully.
                if ($result) {
                    echo "<br/><br/>User Registered successfully.";
                } else {
                    echo "Registration error. Please try again." . mysqli_error($conn);
                }
            }
        }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  
</head>
<body>

    <div style="text-align:right">
        <a href="MainMenu.php" class= "btn">Return</a>
    </div>
    
</body>
</html>