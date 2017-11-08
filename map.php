<?php
 $query = $_GET['query'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Hostel Map</title>
    <style>
      body{
          padding: 0;
          margin:0;
      }
      .map{
          width: 100%;
          height: 100vh;
          margin: 0;
      }
    </style>
</head>
<body>
<iframe class="map" src="https://www.google.com/maps/embed/v1/place?q=<?php echo $query; ?>
      &zoom=17
      &key=AIzaSyCLJ5dqs7QM2VYgKW59VA6PUBUSPqPNfMM">
  </iframe>
</body>
</html>

