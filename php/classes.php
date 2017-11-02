<?php
    #
    #class for handling the user objects
    #
    class User{
       var $username;
       var $password;

       function __construct($username, $password){
            $this->username = $username;
            $this->password = $password;
       }
    //    admin login
       public function adminLogin($con){
            $user_attributes = array();
            $stmt = $con->prepare("SELECT * FROM admin WHERE username = ? AND password = ?");
            $stmt->bind_param('ss', $this->username, $this->password);
            $stmt->execute();
            $results = $stmt->get_result();
            if($stmt->affected_rows == 1){
                foreach($results as $result){
                    return $result;
                }
            }else{
                return "failure";
            }
            $con->close();
        }
    }

    #
    #class for handling the hostel objects
    #
    class Hostel{
        
        var $hostel_name;
        var $location;
        var $latitudes;
        var $longitudes;
        var $hostel_status;
        var $university;
        var $single_room_rent_fees;
        var $double_room_rent_fees;
        var $booking_fees;
        var $distance_from_compus;
        var $description;
        var $custodian_fname;
        var $custodian_lname;
        var $custodian_mobile_phone;
        var $custodian_username;
        var $custodian_password;
        var $custodian_email;
        

        function __construct($hostel_name, $location, $latitudes, $longitudes, $hostel_status, $university, $single_room_rent_fees, $double_room_rent_fees, $booking_fees, $distance_from_compus, $description, $custodian_fname, $custodian_lname, $custodian_mobile_phone, $custodian_username, $custodian_password, $custodian_email){
            
            $this->hostel_name = $hostel_name;
            $this->location = $location;
            $this->latitudes = $latitudes;
            $this->longitudes = $longitudes;
            $this->hostel_status = $hostel_status;
            $this->university = $university;
            $this->single_room_rent_fees = $single_room_rent_fees;
            $this->double_room_rent_fees = $double_room_rent_fees;
            $this->booking_fees = $booking_fees;
            $this->distance_from_compus = $distance_from_compus;
            $this->description = $description;
            $this->custodian_fname = $custodian_fname;
            $this->custodian_lname = $custodian_lname;
            $this->custodian_mobile_phone = $custodian_mobile_phone;
            $this->custodian_username = $custodian_username;
            $this->custodian_password = $custodian_password;
            $this->custodian_email = $custodian_email;
            // $this->image_tmp_name = $image_tmp_name;
            // $this->image_destination = $image_destination;
        }
        public function insertHostel($con){
            // $upload = move_uploaded_file($this->image_tmp_name, $this->image_destination);
            //     if($upload){
            //         // $stmt = $con->prepare("INSERT INTO hostel (id, hostel_number, hostel_name, location, latitudes, longitudes, hostel_image, status, university, single_room_rent_fees, double_room_rent_fees, booking_fees, distance_from_compus, description, custodian_fname, custodian_lname, custodian_mobile_phone, custodian_username, custodian_password, custodian_email) VALUES(????????????????????)");
            //         // $stmt->bind_param('isssffsssffffsssisss', NULL, $this->hostel_number, $this->hostel_name, $this->location, $this->latitudes, $this->longitudes, $this->image_destination, $this->status, $this->university, $this->single_room_rent_fees,  $this->double_room_rent_fees, $this->booking_fees, $this->distance_from_compus, $this->description, $this->custodian_fname, $this->custodian_lname, $this->custodian_mobile_phone, $this->custodian_username,$this->custodian_password, $this->custodian_email);
            //         // $stmt->execute();
            //         echo "success";
            //     }
            $sql1="INSERT INTO `hostel` (`id`, `hostel_name`, `location`, `latitudes`, `longitudes`, `status`, `university`, `single_room_rent_fees`, `double_room_rent_fees`, `booking_fees`, `distance_from_compus`, `description`, `custodian_fname`, `custodian_lname`, `custodian_mobile_phone`, `custodian_username`, `custodian_password`, `custodian_email`) VALUES (NULL, '$this->hostel_name', '$this->location', '$this->latitudes', '$this->longitudes', '$this->hostel_status', '$this->university', '$this->single_room_rent_fees', '$this->double_room_rent_fees', '$this->booking_fees', '$this->distance_from_compus', '$this->description', '$this->custodian_fname', '$this->custodian_lname', '$this->custodian_mobile_phone', '$this->custodian_username', '$this->custodian_password', '$this->custodian_email')";
            // $sql="INSERT INTO hostel (id, hostel_name, location, latitudes, longitudes, status, university, single_room_rent_fees, double_room_rent_fees, booking_fees, distance_from_compus, description, custodian_fname, custodian_lname, custodian_mobile_phone, custodL, '$this->hostel_name', '$this->location', '$this->latitudes', '$this->longitudes', '$this->hostel_status, '$this->university', '$this->single_room_rent_fees',  $this->double_room_rent_fees, '$this->booking_fees', '$this->distance_from_compus', '$this->description', '$this->custodian_fname', '$this->custodian_lname', '$this->custodian_mobile_phone', '$this->custodian_username','$this->custodian_password', '$this->custodian_email')";
            $insert=$con->query($sql1);
            if($insert==1){
                return "success";
            }else{
                return "failed";
            }
            $con->close();
        }
    }
    
    function getHostels($con){
        $sql = "SELECT * FROM hostel";
        $result=$con->query($sql);
        return $result;
    }

    function getHostelById($con, $id){
        $sql = "SELECT * FROM hostel WHERE id='$id'";
        $result=$con->query($sql);
        if ($con->affected_rows==1) {
            $row=$result->fetch_assoc();
            return $row;
          }else {
            return "Hostel selection failed";
          }
          $conn->close();
    }

    function getHostelImagesById($con, $id){
        $rows=Array();
        $sql = "SELECT * FROM images WHERE `hostel_id`='$id'";
        $result=$con->query($sql);
        while($row=$result->fetch_assoc()){
            $rows[]=$row;
        }
        return $rows;
    }

    function getFreeHostelRoomsById($con, $id){
        $rows = Array();
        $sql = "SELECT `room_number` FROM room WHERE `hostel_id`='$id' AND `room_status`='free'";
        $result=$con->query($sql);
        while($row=$result->fetch_assoc()){
            $rows[]=$row['room_number'];
        }
        return $rows;
        $con->close();
    }
   

   
?>