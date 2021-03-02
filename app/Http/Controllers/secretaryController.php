<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rules;

class secretaryController extends Controller
{
    function add_rule(Request $request)
    {

        $rule = new Rules();
        $rule->description = $request->description;

        $rule->save();
        echo "<script>alert('Rule Added');</script>";
        return view('secretary.rule');
    }
    
}
