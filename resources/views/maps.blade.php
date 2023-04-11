<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Google Maps </title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
<script
  src="https://code.jquery.com/jquery-3.4.1.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous"></script>
</head>
<body onload="initialize()">
    <style>
        .container{
          padding: 2%;
          text-align: center;
         
         } 
         #map_wrapper_div {
          height: 400px;
        }
         
        #map_tuts {
            width: 100%;
            height: 100%;
        }
        </style>
    <script>
        jQuery(function($) { 
        var script = document.createElement('script');
        script.src = "https://maps.googleapis.com/maps/api/js?sensor=false&callback=initialize";
        document.body.appendChild(script);
        });
        function initialize() {
  const map = new google.maps.Map(document.getElementById("map_tuts"), {
    zoom: 16,
  });
  const marker = new google.maps.Marker({
    draggable: true,
    animation: google.maps.Animation.DROP,
    map: map,
    icon: "https://developers.google.com/maps/documentation/javascript/examples/full/images/beachflag.png"
  });
  if (navigator.geolocation) {
    navigator.geolocation.watchPosition(function(position) {
      const pos = {
        lat: position.coords.latitude,
        lng: position.coords.longitude,
      };
      marker.setPosition(pos);
      map.setCenter(pos);
    }, function() {
      alert("No se pudo obtener su ubicación");
    });
  } else {
    alert("Su navegador no admite la API de geolocalización");
  }
}

//añadir marcadores
function addStarMarker(map) {

  navigator.geolocation.getCurrentPosition(function(position) {
    var marker = new google.maps.Marker({
      position: {lat: position.coords.latitude, lng: position.coords.longitude}, 
      map: map 
    });
  });
}

        </script>

<div class="container">
  <div class="row">
  <div class="col-12">
   <div class="alert alert-success"><h2>Google Maps Marcadores</h2>
   </div>
   <div id="map_wrapper_div">
    <div style="display: flex;">
        <div style="flex-basis: 50%;">
          <button onclick="addStarMarker({})">Agregar Marcador</button>

        </div>
        <div style="flex-basis: 50%; height:500px">
            <div id="map_tuts"></div>
        </div>
      </div>
      
    
   </div>
  </div>
</div>
</body>
</html>