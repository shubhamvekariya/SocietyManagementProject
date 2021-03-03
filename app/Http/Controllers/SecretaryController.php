<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Http\Request;
use App\Models\Rule;
use Illuminate\Support\Facades\Auth;

class SecretaryController extends Controller
{
    //
    public function approve($user_id)
    {
        $user = User::findOrFail($user_id);
        $user->approved_at = now();
        $user->save();
        return redirect()->back()->with('approvesuccess','User approved successfully');
    }

    public function reject($user_id)
    {
        $user = User::findOrFail($user_id);
        $user->apartment->delete();
        $user->delete();
        return redirect()->back()->with('approvesuccess','User rejected');
    }

    public function needapprovemembers(Request $request)
    {
        if ($request->ajax()) {
            $data = User::where('approved_at',null);
            return DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
                            $btn = '<a href="'.route('society.approvemember',$row['id']).'" class="edit btn btn-primary btn-rounded mx-4" style="width:78px;">Approve</a>';
                            $btn .= '<a href="'.route('society.rejectmember',$row['id']).'" class="edit btn btn-danger btn-rounded mx-3" style="width:78px;">Reject</a>';
                            return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }

        return view('society.approvemembers');
    }
    public function add_rule(Request $request)
    {
        Rule::create([
            'description' =>  $request->description,
            'society_id' => Auth::user()->id,
        ]);
        
        echo "<script>alert('Rule Added');</script>";
        return view('society.rule');
    }

    public function show_rule()
    {
        $rule_data = Rule::all()->toArray();
        return view('society.all_rule',compact('rule_data'));
        //return view('society.all_rule');
    }
}
