<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
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
        return redirect()->route('society.all_rule')->with('success','Rule added successfully');
        }

    public function show_rule(Request $request)
    {
        if ($request->ajax()) {
            $data = Rule::all();
            return DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
                            $btn = '<a href="'.route('society.edit_rule',$row['id']).'" class="edit btn btn-primary btn-rounded mx-4" style="width:78px;">Edit</a>';
                            $btn .= '<a href="'.route('society.delete_rule',$row['id']).'" class="edit btn btn-danger btn-rounded mx-3" style="width:78px;">Delete</a>';
                            return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }

        return view('society.all_rule');

    }

    public function delete_rule($id)
    {
        $rules = Rule::findOrFail($id);
        $rules->delete();

        return redirect()->back()->with('success','Rule Deleted successfully');
    }

    public function edit_rule($id)
    {
        $rules = Rule::findOrFail($id);
        return view('society.edit_rule',compact('rules'));
    }

    public function update_rule(Request $request)
    {
        $rules=Rule::find($request->rid);
        $rules->description = $request->description;
        $rules->save();

        return redirect()->route('society.all_rule')->with('success','Rule edited successfully');
     }
}
