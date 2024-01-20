<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Main Menu</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f5f5f5;
        }
        h1 {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            text-align: center;
            margin-top: 30px;
            color: #333;
        }
        table {
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        th, td {
            padding: 12px;
            text-align: center;
        }
        th {
            background-color: #6B6EE5;
            color: white;
            text-transform: uppercase;
        }
        tr:nth-child(even) {
            background-color: #fff;
        }
        tr:nth-child(odd) {
            background-color: #f9f9f9;
        }
        a {
            text-decoration: none;
            color: #6B6EE5;
            font-weight: bold;
            transition: color 0.3s ease;
        }
        a:hover {
            color: #333;
        }
    </style>
</head>
<body>
    <h1>ADMIN MAIN MENU</h1>
    <table border="2">
        <tr>
            <th colspan="2">Headache</th>
            <th colspan="2">Colds</th>
            <th colspan="2">Stomachache</th>
            <th colspan="2">Others</th>
        </tr>
        <tr>
            <td><a href="HeadAdd.php">ADD</a></td>
            <td><a href="HeadManage.php">MANAGE</a></td>
            <td><a href="ColdsAdd.php">ADD</a></td>
            <td><a href="ColdsManage.php">MANAGE</a></td>
            <td><a href="StomachAdd.php">ADD</a></td>
            <td><a href="StomachManage.php">MANAGE</a></td>
            <td><a href="OthersAdd.php">ADD</a></td>
            <td><a href="OthersManage.php">MANAGE</a></td>
        </tr>
    </table>
</body>
</html>

