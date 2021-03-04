<?php

namespace App\Http\Controllers;

use App\Interfaces\ApproveInterface;
use App\Models\Family;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class MemberController extends Controller
{
    //
    protected $approveInterface;
    public function __construct(ApproveInterface $approveInterface)
    {
        $this->approveInterface = $approveInterface;
    }

    public function index()
    {
        return view('member.index');
    }

    public function approve()
    {
        $this->approveInterface->approval();
        return view('member.approve');
    }

    public function add_familymem(Request $request)
    {
        Family::create([
            'name' =>  $request->name,
            'age' =>  $request->age,
            'contact_no' =>  $request->contact_no,
            'email' =>  $request->email,
            'gender' =>  $request->gender,
            'user_id' => Auth::user()->id,
        ]);
        return redirect()->route('member.allfamilymem')->with('success','Family Member added successfully');
    }

    public function show_familymem(Request $request)
    {
        if ($request->ajax()) {
            $data = Family::all();
            return DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
                            $btn = '<a href="'.route('member.editfamilymem',$row['id']).'" class="edit btn btn-primary btn-rounded mx-4" style="width:78px;">Edit</a>';
                            $btn .= '<a href="'.route('member.deletefamilymem',$row['id']).'" class="edit btn btn-danger btn-rounded mx-3" style="width:78px;">Delete</a>';
                            return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }

        return view('member.allfamilymem');

    }

    public function delete_familymem($id)
    {
        $family_mem = Family::findOrFail($id);
        $family_mem->delete();

        return redirect()->back()->with('success','Family Member Deleted successfully');
    }

    public function edit_familymem($id)
    {
        $family_mem = Family::findOrFail($id);
        return view('member.editfamilymem',compact('family_mem'));
    }

    public function update_familymem(Request $request)
    {
        $family_mem=Family::find($request->fid);;
        $family_mem->name = $request->name;
        $family_mem->email = $request->email;
        $family_mem->contact_no = $request->contact_no;
        $family_mem->age = $request->age;
        $family_mem->gender = $request->gender;

        $family_mem->save();

        return redirect()->route('member.allfamilymem')->with('success','Family Member Edited successfully');
    }
}
