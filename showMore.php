<?php require_once 'components/db_connect.php';
if ($_GET["id"]) {
    $id = $_GET["id"];
    $sql = "SELECT * FROM offers where id= {$id}";
    $result = mysqli_query($connect, $sql);
}
$tbody = '';
$location = '';
$lat = '';
$lng = '';
if (mysqli_num_rows($result)  > 0) {
    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        $tbody .= "<div class='card mb-3' style='max-width: 1000px;'>
  <div class='row g-0'>
    <div class='col-md-4'>
      <img src='pictures/" . $row['img'] . "' class='img-fluid rounded-start' alt='...'>
    </div>
    <div class='col-md-8'>
      <div class='card-body'>
        <h3 class='card-title'>Location Name:</br> " . $row['locationName'] . "</h3>
        <h5 class='card-title'>Price: " . $row['price'] . " </h5>
        <h6 class='card-text'> Description: " . $row['description'] . ".</h6>
        <h6 class='card-text'> Latitude & Longitude:   " . $row['latitude'] . ". " . $row['longitude'] . " </h6>
      </div>
    </div>
  </div>
</div>

  ";
  $location="$row[latitude], $row[longitude]";
  $lat = $row['latitude'];
  $lng = $row['longitude'];
//   echo $lat;
//   echo $lng;
//   var_dump($location);
    };
} else {
    $tbody =   "<tr><td colspan='5'><center>No Data Available </center></td></tr>";
}
mysqli_close($connect);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>show More Details</title>
    <?php require_once 'components/boot.php' ?>
    <style>
        #map{
            height: 80vh;
        }
        html,
        body{
            margin: 3;
            padding: 3;
        }
    </style>
</head>
<body style="background-image: url('pictures/photo.jpg');background-attachment: fixed; background-size: cover; " class="container align-items-center">
    <div class="mt-4">
        <a href="index.php">
            <button type="button" class="btn btn-lg" style="background-color: #887d8a;font-family: 'Dancing Script', cursive;"> <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-house-door" viewBox="0 0 16 16">
                    <path d="M8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4.5a.5.5 0 0 0 .5-.5v-4h2v4a.5.5 0 0 0 .5.5H14a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146zM2.5 14V7.707l5.5-5.5 5.5 5.5V14H10v-4a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5v4H2.5z" />
                </svg> Home</button></a>
        <hr>
    </div>
    <!-- start card -->
    <div class="align-items-center" ;>
        <?= $tbody; ?>
    </div>
    <!-- start card -->

    <!--start show weather -->
    <div class="container">
        <div class="row">
            <?php
            require_once 'REST.php';
                $url = 'https://api.darksky.net/forecast/e329256a741df2bcccffedd3600287c2/' . $location . '?exclude=minutely,hourly,daily,alerts,flags';
                $result = curl_get($url);
                $weather = json_decode($result); //it turns the json into an object
                $fahrenheit = $weather->currently->temperature; //fetch the value from the temperature option
                $celsius = round(($fahrenheit - 32) * (5 / 9), 2); //convert fahrenheit into celsius
                echo "

        <div class='card text-center text-white bg-dark' style='width: 18rem; font-size: 1.2rem'>
            <p class='card-title'>Location: {$weather->timezone} </p>
            <div class='card-body'>
                <p class='card-text'> {$weather->currently->summary} </p>
                <p class='card-text'>{$celsius}°C</p>
                <p class='card-text'>{$fahrenheit}°F</p>

            </div>

        </div>";
         ?>

        </div>

    </div>
    <!--end show weather -->

    <!--start Map -->
    <div id="map"></div>   
    <script>
        var map;
        function initMap() {
            console.log(<?php echo $lat?>)
            console.log(<?php echo $lng?>)
            var location = {
                lat: <?php echo $lat?>,
                lng: <?php echo $lng?>
            };
            // console.log(pin)
            map = new google.maps.Map(document.getElementById('map'), {
                center: location,
                zoom: 8
            });
            var pinpoint = new google.maps.Marker({
                position: location,
                map: map
            });
        }
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBtjaD-saUZQ47PbxigOg25cvuO6_SuX3M&callback=initMap" async defer></script>
 <!--end Map -->
</body>

</html>