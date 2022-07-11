<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;

use Twilio\Rest\Client;

class TwiloSMS extends Controller
{
   function index(Request $request){
        // return $request;

        $receiverNumber = $request->mobile;
        $message = $request->message;
        $string = $request->mobile;
        $str_arr = explode (",", $string);
        print_r($str_arr);

        foreach($str_arr as $phone){
            if(preg_match('/(0|\+?\d{2})(\d{10})/', $phone)) {
                try {

                    $account_sid = getenv("TWILIO_SID");
                    $auth_token = getenv("TWILIO_TOKEN");
                    $twilio_number = getenv("TWILIO_FROM");

                    $client = new Client($account_sid, $auth_token);
                    $client->messages->create($phone, [
                        'from' => $twilio_number,
                        'body' => $message]);

                   echo "sent".$phone;

                } catch (Exception $e) {
                    dd("Error: ". $e->getMessage());
                }
                } else {
                    // session()->flash('error','Invalid phone number'.$phone);
                    // return redirect()->back();
                    echo "Not sent".$phone;
                }
        }

}
}
