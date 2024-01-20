<?php require_once('Connections/dbConPatient.php'); ?>
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

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {
  $insertSQL = sprintf("INSERT INTO stomachache (stomach_name, stomach_price, st_pic) VALUES (%s, %s, %s)",
                       GetSQLValueString($_POST['MedName'], "text"),
                       GetSQLValueString($_POST['MedPrice'], "int"),
                       GetSQLValueString($_POST['MedPic'], "text"));

  mysql_select_db($database_pharmacy, $pharmacy);
  $Result1 = mysql_query($insertSQL, $pharmacy) or die(mysql_error());

  $insertGoTo = "StomachManage.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
}

mysql_select_db($database_dbConPatient, $dbConPatient);
$query_rsStomach = "SELECT * FROM stomachache";
$rsStomach = mysql_query($query_rsStomach, $dbConPatient) or die(mysql_error());
$row_rsStomach = mysql_fetch_assoc($rsStomach);
$totalRows_rsStomach = mysql_num_rows($rsStomach);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Insert New Stomach Medicine</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f5f5f5;
        }
        table {
            width: 50%;
            margin: 50px auto;
            border-collapse: collapse;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        th {
            padding: 20px;
            text-align: center;
            background-color: #5B4AF3;
            color: white;
            text-transform: uppercase;
        }
        td {
            padding: 20px;
            text-align: center;
            font-family: Consolas, 'Andale Mono', 'Lucida Console', 'Lucida Sans Typewriter', Monaco, 'Courier New', monospace;
        }
        label {
            display: block;
            margin-bottom: 10px;
            font-weight: bold;
        }
        input[type="text"] {
            width: calc(100% - 10px);
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-family: Arial, sans-serif;
        }
        input[type="reset"],
        input[type="submit"],
        input[type="button"] {
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-family: Arial, sans-serif;
            transition: background-color 0.3s ease;
        }
        input[type="reset"] {
            background-color: #f44336;
            color: white;
            margin-right: 10px;
        }
        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            margin-right: 10px;
        }
        input[type="button"] {
            background-color: #2196F3;
            color: white;
        }
        input[type="reset"]:hover,
        input[type="submit"]:hover,
        input[type="button"]:hover {
            background-color: #333;
        }
    </style>
</head>
<body>
    <table border="2">
        <tr>
            <th>INSERT NEW STOMACH MEDICINE</th>
        </tr>
        <tr>
            <td>
                <form action="<?php echo $editFormAction; ?>" id="form1" name="form1" method="POST">
                    <label for="MedName">Medicine Name:</label>
                    <input type="text" name="MedName" id="MedName" required>
                    
                    <label for="MedPrice">Price:</label>
                    <input type="text" name="MedPrice" id="MedPrice" required>
                    
                    <label for="MedPic">Picture URL:</label>
                    <input type="text" name="MedPic" id="MedPic" size="60">
                    
                    <input type="reset" name="reset" id="reset" value="Reset">
                    <input type="submit" name="submit" id="submit" value="Insert"> 
                    <input type="button" name="button" id="button" value="Back" onClick="history.back()">
                    <input type="hidden" name="MM_insert" value="form1">
                </form>
            </td>
        </tr>
    </table>
</body>
</html>

<?php
mysql_free_result($rsStomach);
?>
