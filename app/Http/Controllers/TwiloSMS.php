<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;

use Twilio\Rest\Client;

class TwiloSMS extends Controller
{
   function index(Request $request){
    $data = json_decode($request->mobile);
    //    return($data[0]->value);


        $receiverNumber = $request->mobile;
        $message = $request->message;
        $string = $request->mobile;
        $str_arr = explode (",", $string);
        // print_r($str_arr);
    $sent ="";
    $notsent ='';
        foreach($data as $phone){
            if(preg_match('/(0|\+?\d{2})(\d{10})/', $phone->value)) {
                try {

                    $account_sid = getenv("TWILIO_SID");
                    $auth_token = getenv("TWILIO_TOKEN");
                    $twilio_number = getenv("TWILIO_FROM");

                    $client = new Client($account_sid, $auth_token);
                    $client->messages->create($phone->value, [
                        'from' => $twilio_number,
                        'body' => $message]);

                        $sent = $sent ." ". $phone->value;


                } catch (Exception $e) {
                    // dd("Error: ". $e->getMessage());
                    $notsent = $notsent ." ". $phone->value;
                }
                } else {
                    // session()->flash('error','Invalid phone number'.$phone);
                    // return redirect()->back();
                    $notsent = $notsent ." ". $phone->value;

                }
        }


        return view('dashboard',['sent'=>$sent,'notsent'=>$notsent]);

}
}
