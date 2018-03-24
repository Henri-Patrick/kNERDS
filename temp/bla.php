<?php
function callAPI($method, $url, $data){
   $curl = curl_init();
   switch ($method){
      case "POST":
         curl_setopt($curl, CURLOPT_POST, 1);
         if ($data)
            curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
         break;
      case "PUT":
         curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "PUT");
         if ($data)
            curl_setopt($curl, CURLOPT_POSTFIELDS, $data);                         
         break;
      default:
         if ($data)
            $url = sprintf("%s?%s", $url, http_build_query($data));
   }
   // OPTIONS:
   curl_setopt($curl, CURLOPT_URL, $url);

   if($method != "POST"){
    curl_setopt($curl, CURLOPT_HTTPHEADER, array(
        'Authorization: Bearer eyJhbGciOiJSUzI1NiIsImtpZCI6IkVBOUE2OTYzRjIyNUZFQjcwRDZGN0U2ODdCOTUzNTE3M0RDNjA0QTgiLCJ0eXAiOiJKV1QiLCJ4NXQiOiI2cHBwWV9JbF9yY05iMzVvZTVVMUZ6M0dCS2cifQ.eyJuYmYiOjE1MjE4OTg2ODAsImV4cCI6MTUyMTkwMjI4MCwiaXNzIjoiaHR0cHM6Ly9pZGVudGl0eS53aGVyZWlzbXl0cmFuc3BvcnQuY29tIiwiYXVkIjoiaHR0cHM6Ly9pZGVudGl0eS53aGVyZWlzbXl0cmFuc3BvcnQuY29tL3Jlc291cmNlcyIsImNsaWVudF9pZCI6IjhlNDExNDQwLTA1NDgtNDllZC1hYjA4LWQ4MjU0NmE2ZmE3YiIsImNsaWVudF90ZW5hbnQiOiIyZmJjZTQzYS1lODQyLTQ3OTMtOWQ3ZS0xOTJkZTVmOTM0ODkiLCJqdGkiOiI4Y2U4MjQ4YzBmNjAzYjI4MjdiNzU1MmExMzM3YmVlNSIsInNjb3BlIjpbInRyYW5zaXRhcGk6YWxsIl19.XLz7nP5edI0wmWKrK3TGGaNLmmixq0LeVJQmyer4YPwHyI6C-O2a51h0H_SJZ_sXpxvLM1VseXthovayZqYtq0OAR3mgQXFmwzmB-irYTg0IjzEKHbp8bpLU4v_JtfOW43s2IRfe2w-aCZMCsRQMGPyDkrFYwQRWdL-aGwnhqF8ncpR-Oy2r3OEmTwTNiqeKjDwf5weGZlmhDoSgz8jE9gKPzbt6Ei0JYKddUBUV88lubIXfcai3IjSsiV9KYbDHxtXuRabVruWHmy40t5U-VKtNP4d1MXJ4o6FBLs2jVy5R1hyMOTJHNdVY9Km4RON1oi0Y9bfjFew9Bwxvt7LvNg',
        'Content-Type: application/json',
     ));
   }
   else{
    curl_setopt($curl, CURLOPT_HTTPHEADER, array(
        'Content-Type: application/json',
     ));
   }

   
   curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
   curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
   // EXECUTE:
   $result = curl_exec($curl);
   if(!$result){die("Connection Failure");}
   curl_close($curl);
   return $result;
}


// Retrieve token

$data_array =  array(
    "client_id"        => "8e411440-0548-49ed-ab08-d82546a6fa7b",
    "client_secret"     => "10SMVl6YGIYohIcJmUkukabN25VutFCTsY80mX4GFD4=",
    "grant_type"        => "client_credentials",
    "scope"         => "transportapi:all"
    
);

$data=json_encode($data_array);

$make_call = callAPI('POST', 'https://identity.whereismytransport.com/connect/token', json_encode($data_array));
$response = json_decode($make_call, true);
print_r($response);

// print_r(json_encode($data_array));

// $get_data = callAPI('GET', 'https://platform.whereismytransport.com/api/stops?agencies=uCp9CGEAika36aipAPakUQ', false);
// $response = json_decode($get_data, true);
// print_r ($response);