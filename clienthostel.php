<?php
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


    if (isset($_GET['id'])) {
        $id = $_GET['id'];
       $hostel = getHostelById($con, $id);
    //    print_r($hostel);
       $hostel_images = getHostelImagesById($con, $id);
       $hostel_rooms = getFreeHostelRoomsById($con, $id);
    //    print_r($hostel_rooms);
       $number_of_free_rooms = count($hostel_rooms);
       
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
        <style>
            body{
                overflow: auto;
            }
            .capt{
                border-radius: 10px;
                
            }
        </style>
    </head>
    <body>
      <div class="card">
       <?php
       echo "<img src=\"{$hostel_images[0]['name']}\" alt=\"\" class=\"card-img img-fluid img-rounded\">";
        ?>
       
        <div class="card-block">
        
        <?php echo "<h4 class=\"card-title\"><button class=\"btn btn-success\" id=\"bookbutton\" data-toggle=\"modal\" data-target=\"#bookmodal\">Book a room</button></h4>"?>
        
        <div class="card-text">
        <ul class="list-group">
            <li href="#" class="list-group-item list-group-item-action justify-content-between">Number of Free Rooms<span class="badge badge-success badge-pill"><?php echo $number_of_free_rooms;?></span></li>
            <li href="#" class="list-group-item list-group-item-action justify-content-between">Booking fee<span class="badge badge-success badge-pill"><?php echo $hostel['booking_fees'];?> USH</span></li>
            <li href="#" class="list-group-item list-group-item-action justify-content-between">Single Room Fee<span class="badge badge-success badge-pill"><?php echo $hostel['single_room_rent_fees'];?> USH</span></li>
            <li href="#" class="list-group-item list-group-item-action justify-content-between">Double Room Fee<span class="badge badge-success badge-pill"><?php echo $hostel['double_room_rent_fees'];?> USH</span></li>
            <li href="#" class="list-group-item list-group-item-action justify-content-between">Location<span class="badge badge-success badge-pill"><?php echo $hostel['location'];?></span></li>
            <li href="#" class="list-group-item list-group-item-action justify-content-between">Distance From campus<span class="badge badge-success badge-pill"><?php echo $hostel['distance_from_compus'];?> metres</span></li><li href="#" class="list-group-item list-group-item-action justify-content-between">Distance From campus<span class="badge badge-success badge-pill"><?php echo $hostel['distance_from_compus'];?> metres</span></li>
            <li href="#" class="list-group-item list-group-item-action justify-content-between">Status<span class="badge badge-success badge-pill"><?php echo $hostel['status'];?></span></li>
        </ul>
        <button class="btn btn-success btn-block" data-toggle="modal" data-target="#descriptionmodal">More About The Hostel</button>
        <a href="map.php?lat=<?php echo $hostel['latitudes']?>&&long=<?php echo $hostel['longitudes']?>" class="btn btn-success btn-block">Load Hostel On Map</a>
        <div class="modal" id="descriptionmodal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                      <h4 class="modal-title"> 
                        More About <?php echo $hostel['hostel_name']; ?> Hostel
                      </h4>
                      <button class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                      <p><?php echo $hostel['description']; ?></p>
                      <?php foreach ($hostel_images as $image) {
                          echo "<img src=\"{$image['name']}\" class=\"img-fluid\">";
                          echo "<br>";
                          echo "<br>";
                      } ?>
                    </div>
                    <div class="modal-footer">
                      <button class="btn btn-danger btn-block" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal" id="bookmodal">
            <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title">Fill In Appropriately</h5>
            <button class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
            <form action="book.php" method="post">
              <div class="form-group">
              
              <input type="radio" class="radio" name="room_type" value="single" required>
              <label for="room_type">Single Room</label>
              </div>
              <div class="form-group">
              <input type="radio" class="radio" name="room_type" value="double" required>
              <label for="room_type">Double Room</label>
              </div>
              <div class="form-group">
              <label for="room_type">Phone Number <small class="text-mutted text-info">Registered to mobile money with enough balance</small></label>
              <input type="number" class="form-control" name="phone_number" placeholder="eg 0753241266" required>
              
              </div>

              <?php echo '<input type="hidden" name="id" value='.$id.'>'; ?>
              <?php echo '<input type="hidden" name="hostel_name" value='.$hostel['hostel_name'].'>'; ?>
            <div class="modal-footer">
              <button class="btn btn-success" data-toggle="modal" data-target="#booknextmodal" type="submit" name="submit_room_type">Next</button>
            </form>
            <button class="btn btn-danger" data-dismiss="modal">close</button>
            </div>
            </div>
            </div>
        </div>
        
        </div>
        </div>
      </div>
      
    
    <script src="js/jquery.js"></script>
      <script src="js/bootstrap.js"></script>

      <script>
       $(function(){
           var numberofrooms = <?php echo $number_of_free_rooms ?>;
           if(numberofrooms == 0){
            
            $('#bookbutton').addClass('disabled');
            $("#bookbutton").prop('disabled', true);
           }
       });
      </script>
    </body>
    </html>
