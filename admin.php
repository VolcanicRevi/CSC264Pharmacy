<?php
    // Start the session
    session_start();

    // Check if the user is logged in; otherwise, redirect to the login page
    if (!isset($_SESSION['admin'])) {
        header("Location: loginAdmin.php");
        exit();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pharmacy Admin Panel</title>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <style>
        body {
            min-height: 100vh;
            background: url("image1/Pharmacy.jpg") no-repeat;
            background-size: cover;
            background-position: center;
            font-family: 'Poppins', sans-serif;
        }
        .container {
            width: 70%;
            margin: auto;
            background-color: #fff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-top: 50px;
        }
        h2, h3 {
            color: #333;
        }
        ul {
            list-style-type: none;
            padding: 0;
        }
        li {
            background-color: #f9f9f9;
            padding: 10px;
            margin-bottom: 5px;
            border-radius: 5px;
        }
        form {
            margin-top: 15px;
        }
        label {
            display: block;
            margin-bottom: 8px;
        }
        input {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            box-sizing: border-box;
        }
        button {
            background-color: #4caf50;
            color: #fff;
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Pharmacy Admin Panel</h2>

        <!-- Staff Management Section -->
        <h3>List Staff Accounts</h3>
        <p><a href="StaffManage.php">
            <button type = "button"> Staff Info</button>
        </a>
        </p>

        <!-- New Staff Registration Section -->
        <h3>Register New Staff</h3>
        <form id="registrationForm">
            <label for="newUsername">Username:</label>
            <input type="text" id="newUsername" required>
            
            <label for="newPassword">Password:</label>
            <input type="password" id="newPassword" required>

            <button type="button" onclick="registerNewStaff()">Register</button>
        </form>

        <!-- Logout Button -->
        <form action="logout.php" method="post">
            <button type="submit">Logout</button>
        </form>
        <p><a href="MedAdd.php" target="_blank">
        <button type="button">Add New Medicine</button>
        </a>
        </p>
        <p><a href="HeadManage.php" target="_blank">
        <button type="button">Manage Medicine</button>
        </a>
        </p>
    </div>

    <script>
        // Fetch staff list on page load
        $(document).ready(function () {
            fetchStaffList();
        });

        // Function to fetch and display staff list
        function fetchStaffList() {
            $.ajax({
                url: 'get_staff.php',
                method: 'GET',
                success: function (data) {
                    $('#staffList').html(data);
                }
            });
        }

        // Function to register new staff
        function registerNewStaff() {
            var username = $('#newUsername').val();
            var password = $('#newPassword').val();

            $.ajax({
                url: 'register_staff.php',
                method: 'POST',
                data: { username: username, password: password },
                success: function (data) {
                    if (data === 'success') {
                        alert('Staff registered successfully!');
                        fetchStaffList(); // Refresh staff list
                    } else {
                        alert('Error: ' + data);
                    }
                }
            });
        }
    </script>
</body>
</html>
