<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mesg extends Model
{
    public function sendMessage($to,$msg){
        $ch1 = curl_init(); 
        curl_setopt($ch1, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch1,CURLOPT_URL,"https://api.msg91.com/api/v2/sendsms?authkey=337480Aa7o2g6a175f23a196P1&mobiles=".$to."&message=".$msg."&sender=qinexa&route=4&country=91");
        curl_exec($ch1);
        curl_close($ch1);   
    }
}