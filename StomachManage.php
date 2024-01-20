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
$query_rsStomachManage = "SELECT * FROM stomachache";
$rsStomachManage = mysql_query($query_rsStomachManage, $pharmacy) or die(mysql_error());
$row_rsStomachManage = mysql_fetch_assoc($rsStomachManage);
$totalRows_rsStomachManage = mysql_num_rows($rsStomachManage);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Medicine Information</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f5f5f5;
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
        }

        td {
            padding: 10px;
            text-align: center;
            font-family: Arial, sans-serif;
        }

        td:first-child {
            font-weight: bold;
        }

        img {
            max-width: 271px;
            max-height: 225px;
            display: block;
            margin: 0 auto;
        }

        a {
            text-decoration: none;
            padding: 5px 10px;
            background-color: #4CAF50;
            color: white;
            border-radius: 3px;
            transition: background-color 0.3s ease;
        }

        a:hover {
            background-color: #45a049;
        }

        a:visited,
        a:link,
        a:active {
            color: white;
        }
    </style>
</head>

<body>
<table border="2">
    <thead>
    <tr>
        <th>Medicine Name</th>
        <th>Medicine Price</th>
        <th>Picture</th>
        <th colspan="2">Actions</th>
    </tr>
    </thead>
    <tbody>
		<?php do { ?>
      <tr>
        <td><?php echo $row_rsStomachManage['stomach_name']; ?></td>
        <td>RM <?php echo $row_rsStomachManage['stomach_price']; ?></td>
        <td><img src="<?php echo $row_rsStomachManage['st_pic']; ?>" alt=""/></td>
        <td><a href="StomachUpdate.php?id=<?php echo $row_rsStomachManage['stomachID']; ?>">Update</a></td>
        <td><a href="StomachDelete.php?id=<?php echo $row_rsStomachManage['stomachID']; ?>">Delete</a></td>
      </tr>
		<?php } while ($row_rsStomachManage = mysql_fetch_assoc($rsStomachManage)); ?>
    </tbody>
</table>
</body>
</html>
<?php
mysql_free_result($rsStomachManage);
?>
