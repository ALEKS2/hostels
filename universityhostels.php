<?php
require('clientprovider.php');
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


    if (isset($_GET['university'])) {
        $university = $_GET['university'];
       $hostels = getHostelsByUniversity($con, $university);
       
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
    <title>Hostel Booking</title>
</head>
<body>
  <div class="fluid">
    <ul class="list-group">
        <?php
        foreach ($hostels as $hostel) {
            // print_r($hostel);
            echo "<li class=\"list-group-item p-0\"><a class=\"btn btn-primary w-100 h-100 m-0\" href=\"clienthostel.php?id=".$hostel['id']."\">".$hostel['hostel_name']." hostel</a></li>";
        }
         ?>
    </ul>
  </div>

<script src="js/jquery.js"></script>
  <script src="js/bootstrap.js"></script>
</body>
</html>