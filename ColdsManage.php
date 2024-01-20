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
$query_rsColdManage = "SELECT * FROM fever";
$rsColdManage = mysql_query($query_rsColdManage, $pharmacy) or die(mysql_error());
$row_rsColdManage = mysql_fetch_assoc($rsColdManage);
$totalRows_rsColdManage = mysql_num_rows($rsColdManage);
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
            max-width: 235px;
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
        <th width="168">Medicine Name</th>
        <th width="168">Medicine Price</th>
        <th width="243">Picture URL</th>
        <th colspan="2">Actions</th>
    </tr>
    </thead>
    <tbody>
		<?php do { ?>
      <tr>
        <td><?php echo $row_rsColdManage['fever_name']; ?></td>
        <td>RM <?php echo $row_rsColdManage['fever_price']; ?></td>
        <td><img src="<?php echo $row_rsColdManage['fever_image']; ?>" width="220" height="229" alt=""/></td>
        <td><a href="ColdsUpdate.php?id=<?php echo $row_rsColdManage['MedID']; ?>">Update</a></td>
        <td><a href="coldDelete.php?id=<?php echo $row_rsColdManage['MedID']; ?>">Delete</a></td>
      </tr>
		<?php } while ($row_rsColdManage = mysql_fetch_assoc($rsColdManage)); ?>
    </tbody>
</table>
</body>
</html>
<?php
mysql_free_result($rsColdManage);
?>
