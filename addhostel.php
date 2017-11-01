<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/bootstrap.css">
  <link rel="stylesheet" href="css/bootstrap-grid.css">
  <link rel="stylesheet" href="css/bootstrap-reboot.css">
    <title>HBS-Add Hostel</title>
</head>
<body>
<nav class="navbar navbar-light navbar-toggleable-sm bg-inverse navbar-inverse">
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbar-nav"><span class="navbar-toggler-icon"></span></button>
        <div class="container">
            
          <a href="dashboard.php" class="navbar-brand hostel-brand">HBS</a>
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
              </ul>
            </div>
        </div>
    </nav>
    <div class="container">
        
    <form class="form-horizontal" action="php/objects.php" method="POST">

        <div id="divError" >
    
  </div>
      
  <div class="row">
      <div class="col-md-4 col-md-offset-1">
<div class="form-group form-group-sm ">
      <label for="room" style="color:green">Add Custodian:</label><b style="color: #ff0000">     </b> 
     
     </div> <!--end form-group -->
	 
      <div class="form-group form-group-sm ">
      <label for="fname" style="color:#3a87ad"> Custodian First Name:</label><b style="color: #ff0000">      *  *    </b> 
      <input type="text" name="custodian_fname" id="fname" class="form-control" placeholder="first name">  
     </div> <!--end form-group-->

     

     <div class="form-group form-group-sm ">
      <label for="lname" style="color:#3a87ad"> Custodian Last Name:</label>
      <input type="text" name="custodian_lname" id="lname" class="form-control" placeholder="last name" >  
     </div> <!--end form-group-->

     

     <div class="form-group form-group-sm ">
      <label for="age" style="color:#3a87ad"> Custodian Email:</label>
      <input type="text" name="custodian_email" id="email" class="form-control" placeholder="">  
     </div> <!--end form-group-->
	 <div class="form-group form-group-sm ">
      <label for="username" style="color:#3a87ad"> Custodian Username:</label>
      <input type="text" name="custodian_username" id="custodian_username" class="form-control" placeholder="eg Npenelope">  
     </div> <!--end form-group-->
	 <div class="form-group form-group-sm ">
      <label for="password" style="color:#3a87ad">Password:</label>
      <input type="password" name="custodian_password" id="password" class="form-control" placeholder="Password" >  
     </div> <!--end form-group-->
	 	 <div class="form-group form-group-sm ">
      <label for="password2" style="color:#3a87ad">Confirm Password:</label>
      <input type="password" name="password2" id="password2" class="form-control" placeholder="Passwords must match" >  
     </div> <!--end form-group-->

      <div class="form-group form-group-sm ">
      <label for="tel" style="color:#3a87ad">Contact:</label><b style="color: #ff0000">      *  *    </b> 
      <input type="text" name="custodian_mobile_phone" id="tel" class="form-control" placeholder="hostel's telephone contact">  
     </div> <!--end form-group-->

     </div><!--end col-md- -->

    <div class="col-md-4 col-md-offset-1">


       <div class="form-group form-group-sm ">
      <label for="room" style="color:green">Add Hostel:</label><b style="color: #ff0000">     </b> 
     </div> <!--end form-group -->

	  <div class="form-group form-group-sm ">
      <label for="hostel_name" style="color:#3a87ad">Hostel Name:</label><b style="color: #ff0000">      *  *    </b> 
      <input type="text" name="hostel_name" id="hostel_name" class="form-control" placeholder="eg Nana hostel"> 
     </div> <!--end form-group-->

	  <div class="form-group form-group-sm ">
      <label for="status" style="color:#3a87ad">Status:</label><b style="color: #ff0000">      *  *    </b> 
      <select name="hostel_status" id="university" class="form-control" required>
      <option>--select hostel's status---</option>
      <option value="single_boys">Single-Boys</option>
	  <option value="single_girls">Single-Girls</option>
      <option value="mixed">Mixed</option>
       </select>
     </div> <!--end form-group-->
	 
	 <div class="form-group form-group-sm ">
      <label for="university" style="color:#3a87ad">University:</label><b style="color: #ff0000">      *  *    </b> 
      <select name="university" id="university" class="form-control" required>
      <option>--select the University where the hostel belongs---</option>
      
	  <option value="Makerere">Makerere</option>
      <option value="MUBS">MUBS</option>
      <option value="MUST">MUST</option>
	  <option value="Kyambogo">Kyambogo</option>
      
       </select>
     </div> <!--end form-group -->
	 

    <div class="form-group form-group-sm ">
      <label for="location" style="color:#3a87ad">Location:</label><b style="color: #ff0000">      *  *    </b> 
      <select name="hostel_location" id="location" class="form-control" required>
      <option>--select Hostel's location---</option>
     
      <option value="Kasubi">Kasubi</option>
      <option value="Kikoni">Kikoni</option>
	  <option value="Kikumikikumi">Kikumikikumi</option>
	  <option value="Kireka">Kireka</option>
	   <option value="Banda">Banda</option>
      <option value="LDC">LDC</option>
      <option value="Nakawa">Nakawa</option>
      <option value="Nakulabye">Nakulabye</option>
      <option value="Wandegegeya">Wandegegeya</option>
      
       </select>
     </div> <!--end form-group-->
	 
	  <div class="form-group form-group-sm ">
      <label for="Latitude" style="color:#3a87ad">Distance From Campus (metres):</label>
      <input type="number" name="distance_from_compus" id="distance_from_campus" class="form-control" placeholder="">  
     </div> <!--end form-group-->
	                
     <div class="form-group form-group-sm ">
      <label for="Latitude" style="color:#3a87ad">Latitude:</label>
      <input type="text" name="latitudes" id="latitude" class="form-control" placeholder="" >  
     </div> <!--end form-group-->
	 
	  <div class="form-group form-group-sm ">
      <label for="Longitude" style="color:#3a87ad">Longitude:</label>
      <input type="text" name="longitudes" id="longitude" class="form-control" placeholder="" >  
     </div> <!--end form-group-->
     </div>
	 <div class="col-md-4 col-md-offset-1">
	      <div class="form-group form-group-sm ">
      <label for="single_room_rent_fees" style="color:#3a87ad">single Room Fee (UGX):</label>
      <input type="number" name="single_room_rent_fees" id="single_room_rent_fee" class="form-control" placeholder="" >  
     </div> <!--end form-group-->
	 
	  	      <div class="form-group form-group-sm ">
      <label for="double_room_rent_Fee" style="color:#3a87ad">double Room Fee (UGX):</label>
      <input type="number" name="double_room_rent_fees" id="double_room_rent_fee" class="form-control" placeholder="" > 
     </div> <!--end form-group-->
	 
	 	      
	 
	 <div class="form-group form-group-sm ">
      <label for="booking_fee" style="color:#3a87ad">Booking Fee (UGX):</label>
      <input type="number" name="booking_fees" id="booking_fee" class="form-control" placeholder="">  
     </div> <!--end form-group-->
	 
	 <div class="form-group form-group-sm ">
      <label for="description" style="color:#3a87ad">Description:</label>
      <textarea name="description" id="description" class="form-control" placeholder="describe the hostel"></textarea>  
     </div> <!--end form-group-->
	 



     </div><!--end col-md- -->

  </div><!--end row-->
  
      <div class="modal-footer">
      <input type="submit" name="submit_hostel" value="Add" class="btn btn-primary">
      <input type="reset" name="reset" class="btn btn-danger">
    </div> <!--end footer-->
    
  </form> <!-- end form-->
    </div>

    <script src="js/jquery.js"></script>
  <script src="js/bootstrap.js"></script>
</body>
</html>