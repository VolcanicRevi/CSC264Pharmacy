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
$query_rsStaff = "SELECT * FROM staff";
$rsStaff = mysql_query($query_rsStaff, $pharmacy) or die(mysql_error());
$row_rsStaff = mysql_fetch_assoc($rsStaff);
$totalRows_rsStaff = mysql_num_rows($rsStaff);
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
	<style>
        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f5f5f5;
			background: url("image1/Pharmacy.jpg") no-repeat;
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
<h1>List Of Staff Account</h1>
<table width="1026" height="114" border="2">
  <tbody>
    <tr>
      <th height="31" bgcolor="#3246C0" scope="col">Username</th>
      <th bgcolor="#3246C0" scope="col">Password</th>
    </tr>
	  <?php do { ?>
    <tr>
        <td><?php echo $row_rsStaff['username']; ?></td>
        <td><?php echo $row_rsStaff['password']; ?></td>
    </tr>
	  <?php } while ($row_rsStaff = mysql_fetch_assoc($rsStaff)); ?>
  </tbody>
</table>
</body>
</html>
<?php
mysql_free_result($rsStaff);
?>
