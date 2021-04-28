<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contactus;

class ContactusController extends Controller
{
    public function store(Request $request)
    {
        $contact = Contactus::create([
            'name' =>  $request->name,
            'email' =>  $request->email,
            'message' => $request->message,
        ]);

        return redirect()->route('Home');
    }
}
