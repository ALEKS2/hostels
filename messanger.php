<?php
	function messanger($real_phone, $message){
        // Authorisation details.
	$username = "aleksnyombie@gmail.com";
	$hash = "758cbb7b7c7c7f8414235367fd5c9506ee5ef6903e835a3243dd37726df3566a";

	// Config variables. Consult http://api.txtlocal.com/docs for more info.
	$test = "0";

	// Data for text message. This is the text message data.
	$sender = "Hostel Booking"; // This is who the message appears to be from.
	$numbers = $real_phone; // A single number or a comma-seperated list of numbers
	$message = $message;
	// 612 chars or less
	// A single number or a comma-seperated list of numbers
	$message = urlencode($message);
	$data = "username=".$username."&hash=".$hash."&message=".$message."&sender=".$sender."&numbers=".$numbers."&test=".$test;
	$ch = curl_init('http://api.txtlocal.com/send/?');
	curl_setopt($ch, CURLOPT_POST, true);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $result = curl_exec($ch); // This is the result from the API
    $resultStatus = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    if ($resultStatus != 200) {
       return "failure";
    }else{
        return $resultStatus;
    }
	curl_close($ch);
    }
?>