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
 
//  $universities = getUniversities($con);
 if(isset($_GET['bookmessage'])){
     $bookmessage = $_GET['bookmessage'];
     $hostel = $_GET['hostel'];
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
    <h4 class="bg-success p-2 text-white">Choose Your University</h3>
     <ul class="list-group ">
        <li class="list-group-item p-0"><a class="btn btn-success w-100 h-100 m-0" href="universityhostels.php?university=Makerere">Makeerere University</a></li>
        <li class="list-group-item p-0"><a class="btn btn-success w-100 h-100 m-0" href="universityhostels.php?university=Kyambogo">Kyambogo University</a></li>
        <li class="list-group-item p-0"><a class="btn btn-success w-100 h-100 m-0" href="universityhostels.php?university=MUST">Mbarara University</a></li>
        <li class="list-group-item p-0"><a class="btn btn-success w-100 h-100 m-0" href="">Kampala International University</a></li>
        <li class="list-group-item p-0"><a class="btn btn-success w-100 h-100 m-0" href="">Uganda Christian University</a></li>
        <li class="list-group-item p-0"><a class="btn btn-success w-100 h-100 m-0" href="">Busitema University</a></li>
     </ul>
    <div class="modal" id="afterbookmodal">
     <div class="modal-dialog">
      <div class="modal-content">
       <div class="modal-header">
        <h5 class="modal-title">
        Booking Alert
        </h5>
        <button class="close" data-dismiss="modal">&times;</button>
       </div> 
      <div class="modal-body">
        <p class="alert alert-success">You have successfully booked a room in <?php echo $hostel; ?> hostel and a confirmation message has been sent to your mobile phone number</p>
      </div>
      <div class="modal-footer">
       <button class="btn btn-danger btn-block" data-dismiss="modal">Close</button>
      </div>
    </div>
    </div>
    </div>
    <div class="modal" id="bookfailmodal">
    <div class="modal-dialog">
    <div class="modal-content">
     <div class="modal-header">
     <h5 class="modal-title">
     Booking Alert
     </h5>
     <button class="close" data-dismiss="modal">&times;</button>
     </div> 
     <div class="modal-body">
     <p class="alert alert-danger">An Error occured in the booking process, please try again later</p>
     </div>
     <div class="modal-footer">
     <button class="btn btn-danger btn-block" data-dismiss="modal">Close</button>
     </div>
    </div>
    </div>
    
    </div>

    <script src="js/jquery.js"></script>
  <script src="js/bootstrap.js"></script>
  <script>
   $(function(){
     var message = '<?php echo $bookmessage; ?>';
     var hostel = '<?php echo $hostel; ?>';
     if(message == 'success'){
         $('#afterbookmodal').modal('show');
     }else if(message == 'failure'){
        $('#bookfailmodal').modal('show');
     }
   });
  </script>
   
</body>
</html>