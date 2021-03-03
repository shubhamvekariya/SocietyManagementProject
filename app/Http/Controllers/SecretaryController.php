<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rule;

use Illuminate\Support\Facades\Auth;
class SecretaryController extends Controller
{
    function add_rule(Request $request)
    {
        Rule::create([
            'description' =>  $request->description,
            'society_id' => Auth::user()->id,
        ]);
        
        echo "<script>alert('Rule Added');</script>";
        return view('society.rule');
    }

    function show_rule()
    {
        $rule_data = Rule::all()->toArray();
        return view('society.all_rule',compact('rule_data'));
        //return view('society.all_rule');
    }
    
    
}
