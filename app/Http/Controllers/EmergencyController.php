<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;


class EmergencyController extends Controller
{
    public function send_emergency()
    {

        $apartments = Auth::user()->apartment->society->apartment;
        $details = [
            'body' => 'Emergency Alert',
        ];

        foreach($apartments as $apartment)
        {
            $user = $apartment->user;
            $user->notify(new \App\Notifications\Approve($details));

            // SMS notification
            // $basic  = new \Nexmo\Client\Credentials\Basic(env('VONAGE_APP_KEY'), env('VONAGE_APP_SECRET'));
            // $client = new \Nexmo\Client($basic);

            // $message = $client->message()->send([
            //     'to' => '917575800502', // $apartment->user->phone_no
            //     'from' => 'ISocietyClub',
            //     'text' => 'Emergency in your society. Please check'
            // ]);
        }
        return redirect()->route('member.home')->with('success','Emegency! All members notify');
    }
}
