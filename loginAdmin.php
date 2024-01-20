<?php
    // Start the session
    session_start();

    // Check if the user is already logged in, redirect to admin.php
    if (isset($_SESSION['admin'])) {
        header("Location: admin.php");
        exit();
    }

    // Check if the form is submitted
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $username = 'admin'; // You can change this to your actual admin username
        $password = 'admin123'; // You can change this to your actual admin password

        if ($_POST['username'] === $username && $_POST['password'] === $password) {
            // Authentication successful, set session variable
            $_SESSION['admin'] = $username;
            header("Location: admin.php");
            exit();
        } else {
            $error_message = "Invalid username or password";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login - Pharmacy</title>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            background: url("image1/Pharmacy.jpg") no-repeat;
            background-size: cover;
	        background-position: center;
        }
        .container {
            width: 300px;
            background-color: #fff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
        }
        h2 {
            color: #333;
            margin-bottom: 20px;
            text-align: center;
        }
        form {
            margin-top: 15px;
            display: flex;
            flex-direction: column;
        }
        label {
            display: block;
            margin-bottom: 8px;
            color: #555;
        }
        input {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        button {
            background-color: #4caf50;
            color: #fff;
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        button:hover {
            background-color: #45a049;
        }
        p.error-message {
            color: red;
            margin-top: 10px;
            text-align: center;
        }
        header {
            background-color: #3498db;
            padding: 15px;
            text-align: center;
            border-radius: 5px 5px 0 0;
            margin-bottom: 20px;
        }
        header h1 {
            color: #fff;
            margin: 0;
        }
    </style>
</head>
<body>
    <header>
        <h1>Pharmacy Admin Login</h1>
    </header>
    <div class="container">
        <h2>Login</h2>

        <!-- Login Form -->
        <form method="post">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>

            <button type="submit">Login</button>
        </form>

        <?php
        if (isset($error_message)) {
            echo '<p class="error-message">' . $error_message . '</p>';
        }
        ?>
    </div>
</body>
</html>
