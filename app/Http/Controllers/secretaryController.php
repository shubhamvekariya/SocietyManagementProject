<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rule;

class secretaryController extends Controller
{
    function add_rule(Request $request)
    {

        //$rule = new Rule();
        //$rule->description = $request->description;

        //$rule->save();
        //echo "<script>alert('Rule Added');</script>";

        //Rule::destroy();
        return view('secretary.rule');
    }
    
}
