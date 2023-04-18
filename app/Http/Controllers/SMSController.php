<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Twilio\Rest\Client;
use Twilio\Jwt\ClientToken;

class SMSController extends Controller
{
    public function sendSms(Request $request)
{
    $phone = $request->input('phone');
    $message = "Your order has been successfully placed. Thank you for shopping with us!";
    
    $client = new Client('AC7c591ae5d9037dc80a8876e6bb3551ea', '3f8980173813d688bdbfae533d06c74b');
    $client->messages->create(
        $phone,
        array(
            'from' => '+15075095370',
            'body' => $message,
        )
    );

    return redirect()->back()->with('success', 'SMS sent successfully!');
}
}
