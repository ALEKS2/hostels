<?php
 session_start();
require('classes.php');
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


if(isset($_POST['login'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $user = new User($username, $password);
    $user_login = $user->adminLogin($con);
    if($user_login != "failure"){
      
        $_SESSION['user']="admin";
       
        
        header('Location: ../dashboard.php');
    }else{
        header('Location: ../index.php?message=invalid username or password');
    }

}

if(isset($_POST['submit_hostel'])){
    
    $hostel_name = $_POST['hostel_name'];
    $location = $_POST['hostel_location'];
    $latitudes = $_POST['latitudes'];
    $longitudes = $_POST['longitudes'];
    
    $hostel_status = $_POST['hostel_status'];
    $university = $_POST['university'];
    $single_room_rent_fees = $_POST['single_room_rent_fees'];
    $double_room_rent_fees = $_POST['double_room_rent_fees'];
    $booking_fees = $_POST['booking_fees'];
    $distance_from_compus = $_POST['distance_from_compus'];
    $description = $_POST['description'];
    $custodian_fname = $_POST['custodian_fname'];
    $custodian_lname = $_POST['custodian_lname'];
    $custodian_mobile_phone = $_POST['custodian_mobile_phone'];
    $custodian_username = $_POST['custodian_username'];
    $custodian_password = $_POST['custodian_password'];
    $custodian_email = $_POST['custodian_email'];
   
    // echo $hostel_name;
    // echo "<br>";
    // echo $location;
    // echo "<br>";
    // echo $latitudes;
    // echo "<br>";
    // echo $longitudes;
    // echo "<br>";
    // echo $hostel_status;
    // echo "<br>";
    // echo $university;
    // echo "<br>";
    // echo $single_room_rent_fees;
    // echo "<br>";
    // echo $double_room_rent_fees;
    // echo "<br>";
    // echo $booking_fees;
    // echo "<br>";
    // echo $distance_from_compus;
    // echo "<br>";
    // echo $description;
    // echo "<br>";
    // echo $custodian_fname;
    // echo "<br>";
    // echo $custodian_lname;
    // echo "<br>";
    // echo $custodian_mobile_phone;
    // echo "<br>";
    // echo $custodian_username;
    // echo "<br>";
    // echo $custodian_password;
    // echo "<br>";
    // echo $custodian_email;
    $hostel = new Hostel($hostel_name, $location, $latitudes, $longitudes, $hostel_status, $university, $single_room_rent_fees, $double_room_rent_fees, $booking_fees, $distance_from_compus, $description, $custodian_fname, $custodian_lname, $custodian_mobile_phone, $custodian_username, $custodian_password, $custodian_email);
    $insert_hostel =$hostel->insertHostel($con);
    if($insert_hostel=='success'){
        header('Location: ../dashboard.php?message=Hostel successifully added');
    }else{
        header('Location: ../dashboard.php?error=Adding hostel failed');
    }
    
    // $hostel_image = $_FILES['hostel_image'];
    // $image_name = $hostel_image['name'];
    // $image_tmp_name = $hostel_image['tmp_name'];
    // $image_size = $hostel_image['size'];
    // $image_error = $hostel_image['error'];
    // $image_type = $hostel_image['type'];

    // $extention = explode('.', $image_name);
    // $ext = strtolower(end($extention));
    // $allowed = array('jpg', 'jpeg', 'png');
    // if(in_array($ext, $allowed)){
    //     if($image_error === 0){
    //         if($image_size <= 10000000){
    //             $new_image_name = uniqid('', true).'.'.$ext;
    //             $image_destination = '../images/'.$new_image_name;

    //             $hostel = new Hostel($hostel_number, $hostel_name, $location, $latitudes, $longitudes, $hostel_status, $university, $single_room_rent_fees, $double_room_rent_fees, $booking_fees, $distance_from_compus, $description, $custodian_fname, $custodian_lname, $custodian_mobile_phone, $custodian_username, $custodian_password, $custodian_email, $image_tmp_name, $image_destination);
    //             $insert_hostel =$hostel->insertHostel($con);
    //         }else{
    //             header('Location: ../pages/admin.php?message=image size too large');
    //         }
    //     }else{
    //         header('Location: ../pages/admin.php?message=error while uploading image');    
    //     }
    // }else{
    //     header('Location: ../pages/admin.php?message=invalid hostel image formart');    
    // }
    

}
?>