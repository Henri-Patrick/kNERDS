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
        <!-- HTTPS required. HTTP will give a 403 forbidden response -->
    <script src="https://sdk.accountkit.com/en_US/sdk.js"></script>
    <style>
      .register{
    width:60%;
    margin:auto;
}
    </style>
  </head>
  <script>
  // initialize Account Kit with CSRF protection
  AccountKit_OnInteractive = function(){
    AccountKit.init(
      {
        appId:"230029814404436", 
        state:"{{csrf}}", 
        version:"v1.0",
        fbAppEventsEnabled:true,
        // redirect:"{{REDIRECT_URL}}",
        debug:true
      }
    );
  };

  // login callback
  function loginCallback(response) {
    if (response.status === "PARTIALLY_AUTHENTICATED") {
      var code = response.code;
      var csrf = response.state;
      // Send code to server to exchange for access token
      document.getElementById("code").value = response.code;
		  document.getElementById("csrf").value = response.state;
		  document.getElementById("theForm").submit();
    }
    else if (response.status === "NOT_AUTHENTICATED") {
      // handle authentication failure
    }
    else if (response.status === "BAD_PARAMS") {
      // handle bad parameters
    }
  }

  // phone form submission handler
  function smsLogin() {
    // var countryCode = document.getElementById("country_code").value;
    // var phoneNumber = document.getElementById("phone_number").value;
    AccountKit.login(
      'PHONE', 
      {}, // will use default values if not specified
      loginCallback
    );
  }


  // email form submission handler
  function emailLogin() {
    // var emailAddress = document.getElementById("email").value;
    AccountKit.login(
      'EMAIL',
      {},
      loginCallback
    );
  }
  </script> 
  <body>
  
            <?= $content;?>


    <!-- Optional JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.js"></script>
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
    <script type="text/javascript">/*Script for animating the background images*/
    $("document").ready(function(){

      i=1;
      var images=Array("assets/1.jpg","assets/2.jpeg","assets/3.jpeg");
      setInterval(function(){
        
      
          $('.banner').css("background-image","url("+images[i++]+")");
          
      
        
        if (i==images.length)
        {
          i=0;
        }


      },5000);
    });
      
    </script>
  </body>
</html>