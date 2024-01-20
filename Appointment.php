<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Appointment Form</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background-color: #f7f7f7;
        }
        .form-container {
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            padding: 40px;
            width: 400px;
            max-width: 90%;
            text-align: left;
        }
        h2 {
            margin-bottom: 30px;
            color: #333333;
            text-transform: uppercase;
            letter-spacing: 1px;
        }
        label {
            display: block;
            margin-bottom: 8px;
            color: #555555;
            font-weight: 500;
        }
        input[type="text"],
        input[type="number"],
        textarea {
            width: calc(100% - 20px);
            padding: 12px;
            margin-bottom: 20px;
            border: 1px solid #dddddd;
            border-radius: 4px;
            box-sizing: border-box;
            font-size: 16px;
            background-color: #f9f9f9;
            color: #333333;
        }
        textarea {
            height: 100px;
        }
        input[type="submit"] {
            background-color: #ff6f61;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s;
            text-transform: uppercase;
            letter-spacing: 1px;
        }
        input[type="submit"]:hover {
            background-color: #ff4f42;
        }
    </style>
</head>
<body>

<div class="form-container">
    <h2>Appointment Form</h2>
    <form method="post" action="Detail.php">
        <label for="name">Name</label>
        <input type="text" id="name" name="name" required>
        
        <label for="age">Age</label>
        <input type="number" id="age" name="age" min="1" required>
        
        <label for="height">Height</label>
        <input type="text" id="height" name="height" required>
        
        <label for="weight">Weight</label>
        <input type="text" id="weight" name="weight" required>
        
        <label for="sickness">Sickness</label>
        <textarea id="sickness" name="sickness" rows="4" required></textarea>
        
        <input type="submit" name="submit" value="Submit">
    </form>
</div>

</body>
</html>
