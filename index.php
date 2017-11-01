<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<title>Hostel Booking System|Login</title>
	<script type="text/javascript" src="vendors/js/jquery.js"></script>
	<script type="text/javascript" src="vendors/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="vendors/css/bootstrap.min.css">
    
    <style type="text/css">
    	body{
    		padding:0;
		}
		.backer{
			background-image: url("images/hms.jpg");
			 background-size: cover;
			 overflow: hidden;
			background-repeat: no-repeat;
			background-position: fixed;
			height: 100vh;
			width: 100vw;
			margin:0;
			padding-top:10%;
			padding-left: 30%;
		}

    	#logWindow{
          width: 50%;
          
          padding: 5%;
          /* margin-top: 8%; */
          
          color: white;
          background-color: rgba(0,0,0,0.4);
    	} 
    	#logWindow p {
    		font-size: 300%;
    	}
    	#logWindow input[type="submit"]{
    		width: 40%;
    		margin-left:25%
    	}
    	#logWindow input[value="Login"]{
    		font-size: 150%;
    		padding-bottom: 7%
    	}
    	
    	.center{
    		margin-left: 40%;
    	}

    </style>

</head>
<body>
 <div class="backer text-center">
		
<div id="logWindow" >
    <center><p>Login to HBS</p></center>
    <form action="php/objects.php" method="POST" class="form">
        <div class="form-group">
    	     <label>User name</label>
    	     <input type="text" name="username" class="form-control" placeholder="Input your unique username Login"> 
    	</div>

    	<div class="form-group">
    		<label>Password</label>
    		<input type="Password" name="password" class="form-control" placeholder="Input your password">
    	</div> 

    	<div class="form-group">
    		<input type="submit" name="login" value="Login" class="form-control btn btn-success">
			
    	</div>
		
		    	
    </form>

	              <div id="divError" >
                    <?php
                    
                        if (isset($_SESSION['loginError']) && isset($_SESSION['loginAttempt'])) {
                            unset($_SESSION['loginAttempt']);
                            print "Unable to login: errors have been encountered!!"."<br /> \n";

                            foreach ($_SESSION['loginError'] as $error) {      
                                 print $error ."<br />\n";
                             }//end foreach
                         }//end if
                      ?>
                    </div>

</div>
 </div>





</body>
</html>