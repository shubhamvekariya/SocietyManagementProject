<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contactus;

class ContactusController extends Controller
{
    public function store(Request $request)
    {
        $c = Contactus::create([
            'name' =>  $request->name,
            'email' =>  $request->email,
            'message' => $request->message,
        ]);


        //SMS
        // if ($c) {

        //     $basic  = new \Nexmo\Client\Credentials\Basic('b055a611', 'hsubS9eN82UkNusj');
        //     $client = new \Nexmo\Client($basic);
        //     $client->message()->send([
        //         'to' => '8401564660',
        //         'from' => '$request->email',
        //         'text' => 'Message : ' . $request->message,
        //     ]);
        // }

        return redirect()->route('Home');
    }
}
