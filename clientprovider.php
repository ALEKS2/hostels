<?php
//   function getUniversities($con){
//       $rows = Array();
//       $sql = "SELECT `university` FROM hostel";
//       $result = $con->query($sql);
//       while($row=$result->fetch_assoc()){
//         $rows[]=$row['university'];
//       }
//       $universities = array_unique($rows);
//       print_r($universities);
//       $con->close();
//   }

function getHostelsByUniversity($con, $university){
    $rows = Array();
    $sql = "SELECT * FROM hostel WHERE `university`='$university'";
    $result = $con->query($sql);
    while($row = $result->fetch_assoc()){
        $rows[]=$row;
    }
    return $rows;
    $con->close();
}
function getFreeRoomById($con, $id, $room_type){
    $sql = "SELECT `room_number` FROM room WHERE `hostel_id`='$id' AND `room_type`='$room_type' AND `room_status`='free'";
    $result = $con->query($sql);
    if($con->affected_rows>0){
        $room = $result->fetch_assoc();
        $room_no = $room['room_number'];
        return $room_no;
    }else{
        return "failure";
    }
   
    $con->close();
}
function allocateRoom($con, $room_to_allocate){
    $sql = "UPDATE room SET `room_status`='taken' WHERE `room_number`='$room_to_allocate'";
    $result = $con->query($sql);
    if($result == 1){
        return "success";
    }else{
        return "failure";
    }
}
function insertAllocation($con, $id, $allocation_id, $room_to_allocate, $phone_number){
    $sql = "INSERT INTO allocations(`id`, `hoste_id`, `phone`, `allocation_id`, `room_number`) VALUES(NULL, '$id', '$phone_number', '$allocation_id', '$room_to_allocate')";
    $result = $con->query($sql);
    if($result == 1){
        return "success";
    }else{
        return "failure";
    }
}
function verifyphone($phone_number){
    if(is_numeric($phone_number)){
        function count_digit($number) {
            return strlen((string) $number);
            }
            
            //function call
           
            $number_of_digits = count_digit($phone_number); //this is call :)
            if(substr($phone_number, 0, 1) == '0'){
                if($number_of_digits == 10){
                    return "valid";
                }else{
                    return "failure";
                }
            }else{
                return "failure";
            }
    }else{
        return "failure";
    }
}

?>