<?php
 $lat = $_GET['lat'];
 $long = $_GET['long'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>map</title>
    <style>
       body{
           padding: 0;
       }
        #map{
            height: 100vh;
            width: 100%;
            margin: 0;
            
        }
    </style>
</head>
<body>
    
  <div id="map"></div>
<script>
    
//    if (navigator.geolocation) {
//   navigator.geolocation.getCurrentPosition(userPositionSuccess, userPositionError);
// } else {
//   alert("Your browser does not support geolocation.");
// }

// function userPositionSuccess(position) {
//   alert("Latitude: " + position.coords.latitude + " Longitude: " + position.coords.longitude);
// }

// function userPositionError() {
//   alert("There was an error retrieving your location!");
// }
    
    function initMap(){
        var x=navigator.geolocation;
        x.getCurrentPosition(success);
       
        function success(position){
            var lat=<?php echo $lat; ?>;
            var long=<?php echo $long; ?>;
            

             
       var options={
           zoom:17,
           center:{lat:lat,lng:long}
       }

       var map=new google.maps.Map(document.getElementById('map'),options);
       addmarker({lat:lat,lng:long});
    //    add marker
    // var marker=new google.maps.Marker({
    //     position:{lat:lat,lng:long},
    //     map:map
        
    // });
    // var infowindow=new google.maps.InfoWindow({
    //     content:'<h1>You are here</h1>'
    // });

    // marker.addListener('click', () => {
    //     infowindow.open(map,marker);
    // });
    function addmarker(coords){
        var marker=new google.maps.Marker({
        position:coords,
        map:map
        
    });
    }
        }
       
    }
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB3Oa1Y05tNopK4W2HfQMzRN7lAOaNcvn0&callback=initMap"
async defer></script>
</body>
</html>