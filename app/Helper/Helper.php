<?php

namespace App\Helper;

use Illuminate\Support\Facades\Request;

class Helper{
    public static function send_sms($contact, $msg) {
        $url = "http://esms.urssbd.xyz/smsapi";
        $data = [
          "api_key" => "C20072965fd58cf65186e9.30871691",
          "type" => "unicode",
          "contacts" => $contact,
          "senderid" => "BAIUST",
          "msg" => $msg,
        ];
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $response = curl_exec($ch);
        curl_close($ch);
        return $response;
    }
    public static function server_maintenance(){
        $clientIP = Request::getClientIp(true);
        if($clientIP =! '116.206.58.205'){
            return true;
        }
    }
}