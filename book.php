<?php
require('clientprovider.php');
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
  if(isset($_POST['submit_room_type'])){
    $id = $_POST['id'];
    $room_type = $_POST['room_type'];
    $phone_number = $_POST['phone_number'];
    $hostel_name = $_POST['hostel_name'];
    $verifyphone = verifyphone($phone_number);
    if($verifyphone == "failure"){
      header('Location: client.php?bookmessage=failure&&hostel='.$hostel_name);
    }else{
      $room_to_allocate = getFreeRoomById($con, $id, $room_type);
      if($room_to_allocate == "failure"){
        // echo "Booking failed";
        header('Location: client.php?bookmessage=failure&&hostel='.$hostel_name);
      }else{
        $allocate_room = allocateRoom($con, $room_to_allocate);
        if($allocate_room == "success"){
          $first_id = uniqid('');
          $allocation_id = $hostel_name.$first_id;
          $insert_allocation = insertAllocation($con, $id, $allocation_id, $room_to_allocate, $phone_number);
          if($insert_allocation == "success"){
             $message = "You have been allocated Room ".$room_to_allocate." of ".$hostel_name." hostel and your allocation id is ".$allocation_id;
            //  echo $message;
             header('Location: client.php?bookmessage=success&&hostel='.$hostel_name);
          }else{
             
              header('Location: client.php?bookmessage=failure&&hostel='.$hostel_name);
          }
        }else{
           
            header('Location: client.php?bookmessage=failure&&hostel='.$hostel_name);
        }
      }
    }
  }
  
 
  
 ?>