<?php require_once('Connections/pharmacy.php'); ?>
<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

mysql_select_db($database_pharmacy, $pharmacy);
$query_rsMedicineManage = "SELECT * FROM medicine";
$rsMedicineManage = mysql_query($query_rsMedicineManage, $pharmacy) or die(mysql_error());
$row_rsMedicineManage = mysql_fetch_assoc($rsMedicineManage);
$totalRows_rsMedicineManage = mysql_num_rows($rsMedicineManage);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Medicine Information</title>
    <style>
        body {
    font-family: 'Poppins', sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f5f5f5;
    background: url("image1/Pharmacy.jpg") no-repeat;
    text-align: center;
        }

        table {
            width: 800px;
            margin: 50px auto;
            border-collapse: collapse;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        th {
            padding: 15px;
            text-align: center;
            background-color: #5B4AF3;
            color: white;
            text-transform: uppercase;
            font-weight: normal;
            min-width: 150px;
        }

        td {
            padding: 10px;
            text-align: center;
            font-family: Arial, sans-serif;
            min-width: 150px;
        }

        td:first-child {
            font-weight: bold;
        }

        img {
            max-width: 248px;
            max-height: 225px;
            display: block;
            margin: 0 auto;
        }

        a {
            text-decoration: none;
            padding: 5px 10px;
            border-radius: 3px;
            transition: background-color 0.3s ease;
        }

        a.update {
            background-color: #4CAF50;
            color: white;
        }

        a.delete {
            background-color: #f44336;
            color: white;
        }

        a:hover {
            background-color: #333;
        }

        a:visited,
        a:link,
        a:active {
            color: white;
        }
    </style>
</head>

<body>
	<h1 style="font-family: Arial, sans-serif; font-style: normal; text-align: center; font-weight: bold;">List Of Available Medicine</h1>
	<p style="font-family: Arial, sans-serif; font-style: normal; text-align: center; font-weight: bold;"><a href="admin.php">Home</a></p>
<table border="2">
    <thead>
    <tr>
        <th>Medicine Name</th>
        <th>Medicine Price</th>
        <th>Picture URL</th>
        <th colspan="2">Actions</th>
    </tr>
    </thead>
    <tbody>
		<?php do { ?>
      <tr>
        <td><?php echo $row_rsMedicineManage['Med_Name']; ?></td>
        <td>RM <?php echo $row_rsMedicineManage['Med_Price']; ?></td>
        <td><img src="<?php echo $row_rsMedicineManage['Med_Pic']; ?>" alt="60"/></td>
        <td><a href="HeadUpdate.php? id= <?php echo $row_rsMedicineManage['MedID']; ?>" class="update">Update</a></td>
        <td><a href="HeadDelete.php? id= <?php echo $row_rsMedicineManage['MedID']; ?>" class="delete">Delete</a></td>
      </tr>
		<?php } while ($row_rsMedicineManage = mysql_fetch_assoc($rsMedicineManage)); ?>
    </tbody>
</table>
</body>
</html>
<?php
mysql_free_result($rsMedicineManage);
?>
