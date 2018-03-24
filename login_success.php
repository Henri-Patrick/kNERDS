

<?php
// Initialize variables
$app_id = '230029814404436';
$secret = '1a79bae17f8e751eef817c5e456a9cba';
$version = 'v1.0'; // 'v1.1' for example

// Method to send Get request to url
function doCurl($url) {
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, $url);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  $data = json_decode(curl_exec($ch), true);
  curl_close($ch);
  return $data;
}




// Exchange authorization code for access token
$token_exchange_url = 'https://graph.accountkit.com/'.$version.'/access_token?'.
  'grant_type=authorization_code'.
  '&code='.$_POST['code'].
  "&access_token=AA|$app_id|$secret";
$data = doCurl($token_exchange_url);
$user_id = $data['id'];
$user_access_token = $data['access_token'];
$refresh_interval = $data['token_refresh_interval_sec'];

// Get Account Kit information
$me_endpoint_url = 'https://graph.accountkit.com/'.$version.'/me?'.
  'access_token='.$user_access_token;
$data = doCurl($me_endpoint_url);
$phone = isset($data['phone']) ? $data['phone']['number'] : '';
$email = isset($data['email']) ? $data['email']['address'] : '';
?>

<head>
  <title>Account Kit PHP App</title>
</head>
<body>
  <div>User ID: <?php echo $user_id; ?></div>
  <div>Phone Number: <?php echo $phone; ?></div>
  <div>Email: <?php echo $email; ?></div>
  <div>Access Token: <?php echo $user_access_token; ?></div>
  <div>Refresh Interval: <?php echo $refresh_interval; ?></div>


  <?php
  require("class/Users.php");
  $datas= New Users();
  if(isset($phone)){
    $sms=$datas->getUserswith($phone);
    if($sms){
      
      session_destroy();
      session_start();
      $_SESSION['phone']=$phone;
      $_SESSION['id']=$sms[0]->id;
      $_SESSION['first_name']=$sms[0]->first_name;
      $_SESSION['last_name']=$sms[0]->last_name;
      $_SESSION['email']=$sms[0]->email;
      $_SESSION['phone_n']=$sms[0]->id_reg;
      

      header("Location: home.php?p=welcome");
    }
    else{
          session_destroy();
          session_start();
      
         $_SESSION['phone']=$phone;
         header("Location:index.php?p=register");
    }
    
  }
  elseif(isset($email)){
    $mail=$datas->getUserBy($email);
    if($mail){
      session_destroy();
      session_start();
      $_SESSION['email']=$email;

      header("Location: home.php?p=welcome");
    }
    else{
      session_destroy();
      session_start();
      $_SESSION['email']=$email;
      header("Location:index.php?p=register");
    }
    
  }
  
?>
</body>
