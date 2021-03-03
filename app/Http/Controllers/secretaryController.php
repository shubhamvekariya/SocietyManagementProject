<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rule;

use Illuminate\Support\Facades\Auth;
class secretaryController extends Controller
{
    function add_rule(Request $request)
    {

        //$rule = new Rule();
        //$rule->description = $request->description;

        //$rule->save();
        //echo "<script>alert('Rule Added');</script>";

        //Rule::destroy();
        Rule::create([
            'description' =>  $request->description,
            'society_id' => Auth::user()->id,
        ]);
        //dd( Input::all() );
        return view('secretary.rule');
    }
    
}
