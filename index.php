<?php
    
require 'vendor/autoload.php';
use AfricasTalking\SDK\AfricasTalking;
$username = "sandbox";
$apiKey = "6c40d01ede05694261d98e9b294c69091c819251548ac9879e16ddde4f0c340e";
@$from    = $_POST["from"];
@$phoneNumber  = $_POST["id"];
@$text = $_POST["text"];
@$to = $_POST["to"];
if(strcmp($text, "") == 0){
    
}
else if(strcasecmp($text, "Sell") == 0){
  
     $message = "Welcome to Text2Farm the fastest route to get your farm produce to the market. \n Press 1 to Sell.\nYou are not a farmer then Press 2.";
     sendSms($from,$username,$apiKey,$message);
}
else if(strcasecmp($text, "1") == 0){
    
     $message = "Enough of food wastage, please type in your commodity, including price";
     sendSms($from,$username,$apiKey,$message);
    
}
else if(strcasecmp($text, "2") == 0){
    
     $message = "What farm fresh would you like to buy today,input below";
     sendSms($from,$username,$apiKey,$message);
 }
 else{
     
     $message = "Thank you for your Patronage,We will get in touch as soon as possible";
     sendSms($from,$username,$apiKey,$message);
 }



function sendSms($phone,$username,$apiKey,$message){
    
    global $AT;
    $AT  = new AfricasTalking($username,$apiKey);
    $sms = $AT->sms();
    $response = $sms->send(array(
        "to" => $phone,
        "from" => "Text2Farm",
        "message" =>$message ,
    ));
    header("Content-Type: application/json; charset=UTF-8");
    echo json_encode($response);
 }

