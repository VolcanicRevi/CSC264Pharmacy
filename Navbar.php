<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  
</head>

<style>
    body{
        font-family: 'Poppins';
    }

    .navbar-custom{
        background-color: white;
    }

</style>


<body>

<nav class="navbar navbar-custom ">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="index.php">Home</a>
    </div>
    <ul class="nav navbar-nav">
      
      <li><a href="Appointment.php"><span class="glyphicon glyphicon-folder-open"></span> Appointment</a></li>
      <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="glyphicon glyphicon-plus"></span> Medicine List
            <span class="caret"></span></a>
            <ul class="dropdown-menu">
            <li><a href="ColdCart.php">Fever</a></li>
            <li><a href="StomachCart.php">Stomachache</a></li>
            <li><a href="HeadCart.php">Headache</a></li>
            <li><a href="OthersCart.php">Others</a></li>
            </ul>
      </li>
      <li><a href="MedList.php"><span class="glyphicon glyphicon-plus"></span> Purchase Medicine</a></li>
      <li><a href="About.php"><span class="glyphicon glyphicon-pencil"></span> About Us</a></li>
      <li><a href="Contact.php"><span class="glyphicon glyphicon-comment"></span> Contact Us</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
    <li class="nav-item">
        <li><a href="logout.php"><span class="glyphicon glyphicon-home"></span></a></li>
    </ul>
  </div>

  
</nav>

</body>
</html>
