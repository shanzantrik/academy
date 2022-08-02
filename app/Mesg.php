<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mesg extends Model
{

    public function sendMessage($numbers,$message){

    // $apiKey = urlencode('NTk1NjY4NTc0MjYzNDM2NjRmNmU3OTY4NDUzNTM3NGI=');
    // $sender = urlencode('TXTLCL');

    // // Prepare data for POST request
    // $data = array('apikey' => $apiKey, 'numbers' => $numbers, "sender" => $sender, "message" => $message);
    // // Send the POST request with cURL
    // $ch = curl_init('https://api.textlocal.in/send/');
    // curl_setopt($ch, CURLOPT_POST, true);
    // curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    // curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    // $response = curl_exec($ch);
    // curl_close($ch);

        $ch1 = curl_init(); 
        curl_setopt($ch1, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch1,CURLOPT_URL,"https://api.msg91.com/api/v2/sendsms?authkey=337480Aa7o2g6a175f23a196P1&mobiles=".$numbers."&message=".$message."&sender=qinexa&route=4&country=91");
        $response = curl_exec($ch1);
        curl_close($ch1);  
    //dd($response); 
    }
}