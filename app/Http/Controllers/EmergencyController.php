<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Auth;


class EmergencyController extends Controller
{
    public function send_emergency()
    {
        //$user =User::all();
        $apartments = Auth::user()->apartment->society->apartment;
        $details = [
            'body' => 'Emergency Alert',
        ];
        //foreach($user as $u)
        foreach($apartments as $apartment)
        {
            $user = $apartment->user;
            $user->notify(new \App\Notifications\Approve($details));
           echo "<script>alert('done');</script>";
        }




    }
}
