<?php

namespace App\Http\Controllers;

use App\Interfaces\ApproveInterface;
use App\Interfaces\MemberInterface;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Models\Rule;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class SecretaryController extends Controller
{
    protected $approveInterface;
    protected $memberInterface;
    public function __construct(ApproveInterface $approveInterface,MemberInterface $memberInterface)
    {
        $this->approveInterface = $approveInterface;
        $this->memberInterface = $memberInterface;
    }
    //
    public function approve($user_id)
    {
        $status = $this->approveInterface->approve($user_id);
        if($status)
            return redirect()->back()->with('approvesuccess','User approved successfully');
        else
            return redirect()->back()->with('approveerror','Something went wrong');
    }

    public function reject($user_id)
    {
        $status = $this->approveInterface->reject($user_id);
        if($status)
            return redirect()->back()->with('approvesuccess','User rejected');
        else
            return redirect()->back()->with('approveerror','Something went wrong');
        return redirect()->back()->with('approvesuccess','User rejected');
    }

    public function disapprovemembers(Request $request)
    {
        if ($request->ajax()) {
            return $this->approveInterface->disapprovemembers();
        }

        return view('society.approvemembers');
    }

    public function get_members(Request $request)
    {
        if ($request->ajax()) {
            return $this->memberInterface->getMembers();
        }
        return view('society.committeemembers');
    }

    public function add_committee_members($user_id)
    {
        $cmember = User::findOrFail($user_id);
        $cmember->assignRole('committeemember');
        return redirect()->route('society.cmembers')->with('success','Now, Member('.$cmember->email.') is committee member');
    }

    public function remove_committee_members($user_id)
    {
        $cmember = User::findOrFail($user_id);
        $cmember->removeRole('committeemember');
        return redirect()->route('society.cmembers')->with('success','Committee member('.$cmember->email.') removed');
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
