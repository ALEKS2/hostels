<?php

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

if(Isset($_POST['submit_room'])){
    $id = $_POST['id'];
    $room_number = $_POST['room_number'];
    $room_type = $_POST['room_type'];
    $room_status = "free";
    $sql = "INSERT INTO room(`id`, `room_number`, `room_type`, `room_status`, `hostel_id`) VALUES(NULL, '$room_number', '$room_type', '$room_status', '$id')";
    $insert = $con->query($sql);
    if($insert == 1){
        header('Location: readmore.php?message=success&&id='.$id);
    }else{
        header('Location: readmore.php?message=error&&id='.$id);
    }
}

if(isset($_POST['update_room'])){
    $id = $_POST['id'];
    $room_number = $_POST['room_number'];
    $room_status = $_POST['room_status'];
    $sql = "UPDATE room SET `room_status`='$room_status' WHERE `room_number`='$room_number' AND `hostel_id`='$id'";
    $update = $con->query($sql);
     

}
 ?>