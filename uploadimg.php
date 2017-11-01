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

 
if(isset($_POST['submit_images'])){

        $id=$_POST['id'];
        
       
        $hostel_image = $_FILES['file_img'];
        $image_name = $hostel_image['name'];
        $image_tmp_name = $hostel_image['tmp_name'];
        $image_size = $hostel_image['size'];
        $image_error = $hostel_image['error'];
        $image_type = $hostel_image['type'];
    
        $extention = explode('.', $image_name);
        $ext = strtolower(end($extention));
        $allowed = array('jpg', 'jpeg', 'png');
        if(in_array($ext, $allowed)){
            if($image_error === 0){
                if($image_size <= 10000000){
                    $new_image_name = uniqid('', true).'.'.$ext;
                    $image_destination = 'images/uploads/'.$new_image_name;
    
                    $upload = move_uploaded_file($image_tmp_name, $image_destination);
                    if($upload){
                        $sql="INSERT INTO images(`id`, `name`, `hostel_id`) VALUES(NULL, '$image_destination', '$id')";
                        $insert=$con->query($sql);
                        if($insert==1){
                            header('Location: readmore.php?message=success&&id='.$id);
                        }else{
                            header('Location: readmore.php?message=error&&id='.$id);
                        }
                    }
                }else{
                    header('Location: readmore.php?message=image size too large&&id='.$id);
                }
            }else{
                header('Location: readmore.php?message=error while uploading image&&id='.$id);
                
            }
        }else{
            header('Location: readmore.php?message=invalid hostel image formart&&id='.$id);
           
        }
    }
?>