<?php 
  session_start();
  require('php/classes.php');
  if($_SESSION['user'] != "admin"){
    header('Location: index.php');
  }

  // create a db connection
$db_host='localhost';
$db_user='root';
$db_password='';
$db = 'hostels';
$con = new mysqli($db_host, $db_user, $db_password, $db);
if($con->connect_error){
    die('db connection failed '.$con->connect_error);
}else{
    // echo "db connection successful";
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="css/bootstrap.css">
  <link rel="stylesheet" href="css/bootstrap-grid.css">
  <link rel="stylesheet" href="css/bootstrap-reboot.css">
  <title>Dashboard</title>

  <style type="text/css">
      body{
        background-image: url("images/dash.jpg");
        
            background-size: cover;
            background-repeat: no-repeat;
            background-position: fixed;
 
      }
      
      


    </style>
</head>
<body>
<nav class="navbar navbar-light navbar-toggleable-sm bg-inverse navbar-inverse">
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbar-nav"><span class="navbar-toggler-icon"></span></button>
        <div class="container">
            
          <a href="#" class="navbar-brand hostel-brand">HBS</a>
            <div class="collapse navbar-collapse" id="navbar-nav">
              <ul class="navbar-nav">
                  <li class="nav-item">
                      <a href="dashboard.php" class="nav-link">Dashboard</a>
                  </li>
                  <li class="nav-item">
                      <a href="addhostel.php" class="nav-link">Add Hostel</a>
                  </li>
                  <li class="nav-item">
                      <a href="#" class="nav-link">Payement Requests</a>
                  </li>
                  <li class="nav-item">  
                      <a href="#" class="nav-link">Contact</a>
                  </li>
                  <li class="nav-item">  
                      <a href="logout.php" class="nav-link">Logout</a>
                  </li>
              </ul>
            </div>
        </div>
    </nav>
    <div class="container">
      <ul class="list-group">
      <?php
        $available_hostels = getHostels($con);
        foreach($available_hostels as $hostel){
            echo "<li class=\"list-group-item bg-info d-flex flex-column text-white text-center h1\">";
            echo "<br>";
            echo "Hostel Name: ".$hostel['hostel_name'];
            echo "<br>";
            echo "University: ".$hostel['university'];
            echo "<br>";
            echo "Location: ".$hostel['location'];
            echo "<br>";
            echo "Custodian: ".$hostel['custodian_fname']." ".$hostel['custodian_lname'];
            echo "<hr>";
            echo "<a class=\"btn btn-outline-primary\" href=\"readmore.php?id={$hostel['id']}\">Read More</a>";
            echo "</li>";
        }
       ?>
      </ul>
    </div>

  <script src="js/jquery.js"></script>
  <script src="js/bootstrap.js"></script>
</body>
</html>