<?php 
    session_start();
    require('php/classes.php');

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
    if(isset($_GET['id'])){
        $id = $_GET['id'];
    }
    
    $hostel = getHostelById($con, $id);
    // print_r($hostel);
    // $hostel_images=getHostelImagesById($con, $id);
    // print_r($hostel_images);
    
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
    <title><?php echo $hostel['hostel_name']." Hostel"; ?></title>

    <style>
     .himages{
         max-height: 50vh;
         overflow: hidden;
         display: flex;
     }
     .carousel-inner > .carousel-item > img {
  width:100%;
  max-height:450px;
  image: cover;
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
    <div class="himages">
    <div class="carousel slide" id="slider2" data-ride="carousel">
       <div class="carousel-inner" role="listbox">
       <div class="carousel-item active">
           <img src="images/dash.jpg" alt="First Slide" class="d-block img-fluid">
         </div>
       <?php
        $rows=Array();
        $sql = "SELECT * FROM images WHERE hostel_id='$id'";
        $result=$con->query($sql);
        while($row=$result->fetch_assoc()){
            $rows[]=$row;
          }
          foreach ($rows as $row) {
              $src=$row['name'];
              echo '<div class="carousel-item">';
              echo '<img src="'.$src.'" alt="First Slide" class="d-block img-fluid">';
              echo '</div>';
          }
        ?>
        
         
       </div>
       <a href="#slider2" class="carousel-control-prev" data-slide="prev">
         <span class="carousel-control-prev-icon">
       </a>
       <a href="#slider2" class="carousel-control-next" data-slide="next">
         <span class="carousel-control-next-icon">
       </a>
     </div>
    </div>
    
     <div class="hostel-data d-flex flex-column bg-faded p-5 text-inverse h4">
      <span>Hostel Name: <?php echo $hostel['hostel_name'] ?></span>
      <span>Hostel Location: <?php echo $hostel['location'] ?></span>
      <span>Hostel Latitudes: <?php echo $hostel['latitudes'] ?></span>
      <span>Hostel Logitudes: <?php echo $hostel['longitudes'] ?></span>
      <span>Hostel Status: <?php echo $hostel['status'] ?></span>
      <span>University: <?php echo $hostel['university'] ?></span>
      <span>Single Room Rent Fee: <?php echo $hostel['single_room_rent_fees'] ?></span>
      <span>Double Room Rent Fee: <?php echo $hostel['double_room_rent_fees'] ?></span>
      <span>Distance from Campus: <?php echo $hostel['distance_from_compus']." metres" ?></span>
      <span>Custodian's First Name: <?php echo $hostel['custodian_fname'] ?></span>
      <span>Custodian's Last Name: <?php echo $hostel['custodian_lname'] ?></span>
      <span>Custodian's Contact: <?php echo $hostel['custodian_mobile_phone'] ?></span>
      <span>Custodian's Username: <?php echo $hostel['custodian_username'] ?></span>
      <span>Custodian's Email: <?php echo $hostel['custodian_email'] ?></span>
      <span>Hostel Description: <?php echo $hostel['description'] ?></span>
      
     </div><hr>
     <div class="hostel-actions">
      <button class="btn btn-success" data-toggle="modal" data-target="#imagesmodel">Add Hostel Images</button>
      <button class="btn btn-success" data-toggle="modal" data-target="#roomsmodal">Add Hostel Rooms</button>
      <a href="" class="btn btn-success">Edit Hostel</a>
      <button class="btn btn-success" data-toggle="modal" data-target="#roomupdatemodal">Update Room Status</button>
      

      <div class="modal" id="imagesmodel">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="imagesmodallabel">
                Add Hostel Images
                </h5>
                <button class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" action="uploadimg.php" method="POST" enctype="multipart/form-data">

                    <div class="form-group">
                        <input type="file" name="file_img" class="form-control" multiple />
                              
                    </div>
                    <?php echo '<input type="hidden" name="id" value='.$id.'>'; ?>
        
                    
                </div>
                <div class="modal-footer">
                <input type="submit" name="submit_images" class="btn btn-success"/> 
                </form>
                 <button class="btn btn-danger" data-dismiss="modal">Upload</button>
                </div>
                </div>
            
        </div>
      </div>
      
      <div class="modal" id="roomsmodal">
          <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">
                        Add Hostel Rooms
                    </h5>
                    <button class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                <form action="addroom.php" method="post">
                    <div class="form-group">
                        <label for="">Room Number</label>
                        <input type="text" name="room_number" placeholder="eg A2" class="form-control"> 
                    </div>
                    <div class="form-group">
                        <label for="">Room Type</label>
                        <select name="room_type" class="form-control" id="">
                         <option value=""></option>
                         <option value="single">Single</option>
                         <option value="double">Double</option>
                        </select>
                    </div>
                    <?php echo '<input type="hidden" name="id" value='.$id.'>'; ?>
                <div class="modal-footer"> 
                    <input type="submit" class="btn btn-success" name="submit_room" values="Submit">  
                </form>
                    <button class="btn btn-danger" data-dismiss="modal">Close</button>
                </div> 
                </div>
            </div>
          </div>
      </div>

      <div class="modal" id="roomupdatemodal">
          <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">
                        Update Room Status
                    </h5>
                    <button class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                <form action="addroom.php" method="post">
                    <div class="form-group">
                        <label for="">Room Number</label>
                        <input type="text" name="room_number" placeholder="eg A2" class="form-control"> 
                    </div>
                    <div class="form-group">
                        <label for="">Room Status</label>
                        <select name="room_status" class="form-control" id="">
                         <option value=""></option>
                         <option value="free">Free</option>
                         <option value="taken">Taken</option>
                        </select>
                    </div>
                    <?php echo '<input type="hidden" name="id" value='.$id.'>'; ?>
                <div class="modal-footer"> 
                    <input type="submit" class="btn btn-success" name="update_room" values="Update">  
                </form>
                    <button class="btn btn-danger" data-dismiss="modal">Close</button>
                </div> 
                </div>
            </div>
          </div>
      </div>
       
    </div>

</div>
    
    <script src="js/jquery.js"></script>
  <script src="js/bootstrap.js"></script>
</body>
</html>