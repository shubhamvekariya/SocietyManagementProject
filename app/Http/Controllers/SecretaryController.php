<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

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

    public function destroy($user_id)
    {
        $user = User::destroy($user_id);
        return redirect()->back()->withMessage('User rejected');
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
}
