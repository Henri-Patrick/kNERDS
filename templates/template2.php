<!-- 
Developed from scratch by

Developer={
     Kevin Nyawakira,
     kevin81767@gmail.com,
     kevin81767(instagram,github),
     kevin81767.github.io
}
-->

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>kNERDS</title>
    <link rel="stylesheet" href="css/style.css">
    <!--Animate css-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    <!--Internal link for font awesome-->
    <link rel="stylesheet" type="text/css" href="css/font-awesome-4.7.0/css/font-awesome.min.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Oswald|Abel|Fjalla+One" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Fira+Sans" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.14/semantic.min.css">
    <style>
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #map {
        height: 100%;
      }
      /* Optional: Makes the sample page fill the window. */
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }

      
      
    </style>
  </head>
  
  <body>
  <nav class="navbar navbar-expand-sm bg-dark navbar-dark fixed-bottom">
    <a style="color:white;font:bold;" class="navbar-brand" data-toggle="modal" data-target="#myModal"><h3>K_CONNECT</h3></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="collapsibleNavbar">
      <ul class="navbar-nav">
        <li class="nav-item">
          <button type="button" class="btn btn-info btn-sm" ><i class="fa fa-map-marker fa-2x"></i>CURRENT LOCATION</button>
        </li>
        <li class="nav-item">
          <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#myStops"><i class="fa fa-map fa-2x"></i>BUS STOPS</button>
        </li>
        <li class="nav-item">
        <button type="button" class="btn btn-info btn-sm"><i class="fa fa-bus fa-2x"></i>JOURNEYS</button>
        </li>    
      </ul>
    </div>  
  </nav>
        <?= $content;?>
        
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.js"></script>
    <script>
        // Note: This example requires that you consent to location sharing when
      // prompted by your browser. If you see the error "The Geolocation service
      // failed.", it means you probably did not give permission for the browser to
      // locate you.

      

      function initMap() {
        var map = new google.maps.Map(document.getElementById('map'), {
          center: {lat: -34.397, lng: 150.644},
          zoom: 13
        });
        var infoWindow = new google.maps.InfoWindow({map: map});
        

        //Marking the bus stops
        for(n=0; n<stops.length; n++){
          console.log(stops[n])
        	stoplocation = stops[n]['geometry']["coordinates"];
        	stopLatLong = {lat: stoplocation[1], lng: stoplocation[0]}
        	var marker = new google.maps.Marker({
	          position: stopLatLong,
	          map: map,
            mapTypeId: 'satellite',        
            icon: 'assets/icon2.png',
            title: stops[n]['name']
	        });

          //open onclick
        google.maps.event.addListener(marker, 'click', function() {


           
            // begin of ajaxrequest
            // $(document).ready(function(){

            //     var stopLatLong;

            //     $.post("sendRequest.php",
            //     {
            //       coord : stopLatLong;
            //     },
            //     function(data,status){
            //         alert("Data: " + data + "\nStatus: " + status);
            //     });
            
            // });



            
          });

          
        }

        


        // Try HTML5 geolocation.
        if (navigator.geolocation) {
          navigator.geolocation.getCurrentPosition(function(position) {
            var pos = {
              lat: position.coords.latitude,
              lng: position.coords.longitude
            };
            infoWindow.setPosition(pos);
            infoWindow.setContent('You Location.');
            map.setCenter(pos);
          }, function() {
            handleLocationError(true, infoWindow, map.getCenter());
          });
        } else {
          // Browser doesn't support Geolocation
          handleLocationError(false, infoWindow, map.getCenter());
        }
      }

      function handleLocationError(browserHasGeolocation, infoWindow, pos) {
        infoWindow.setPosition(pos);
        infoWindow.setContent(browserHasGeolocation ?
                              'Error: The Geolocation service failed.' :
                              'Error: Your browser doesn\'t support geolocation.');
      }
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB_6Qfrt82XuK2Ac4qcmmII9QvmqCp5CAw&callback=initMap">
    </script>
    <script type="text/javascript">
    	var stops = <?php echo json_encode($stops); ?>

    	var x = document.getElementById("demo");
		$(document).ready(function(){
			getLocation();

			navigator.geolocation.getCurrentPosition(function(position){
				console.log(position)
			}, function(err){
				alert("error");
				console.log(err)
			})
		})

		function getLocation() {
		    if (navigator.geolocation) {
		        navigator.geolocation.getCurrentPosition(showPosition);
		    } else {
		        x.innerHTML = "Geolocation is not supported by this browser.";
		    }
		}
		function showPosition(position) {
			alert("Show position")
		    console.log(x);
		}
</script>
    <script src="bottom-nav.js"></script>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.14/semantic.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
    <script src="js/calculate_price.js"></script>
    <script src="js/send_order.js"></script>
    <script src="js/wow.min.js"></script>
    <script>
    new WOW().init();
    </script>
    <!--For the image slide in the description -->
  </body>
</html>