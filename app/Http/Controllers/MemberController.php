<?php

namespace App\Http\Controllers;

use App\Interfaces\ApproveInterface;
use App\Interfaces\FamilymemInterface;
use App\Models\Family;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class MemberController extends Controller
{
    //
    protected $approveInterface;
    protected $familymemInterface;

    public function __construct(ApproveInterface $approveInterface,FamilymemInterface $familymemInterface)
    {
        $this->approveInterface = $approveInterface;
        $this->familymemInterface = $familymemInterface;
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
        $status = $this->familymemInterface->addFamilymem($request);
        if($status)
        {
            return redirect()->route('member.allfamilymem')->with('success','Family Member added successfully');
        }
        else
        {
            return redirect()->back()->with('error','Something went wrong');
        }


    }

    public function show_familymem(Request $request)
    {
        if ($request->ajax())
        {
           return $this->familymemInterface->showFamilymem($request);
        }
        return view('member.allfamilymem');

    }

    public function delete_familymem($id)
    {
        $status = $this->familymemInterface->deleteFamilymem($id);
        if($status)
        {
            return redirect()->back()->with('success','Family Member Deleted successfully');
        }
        else
        {
            return redirect()->back()->with('error','Something went wrong');
        }
    }

    public function edit_familymem($id)
    {
        $family_mem = $this->familymemInterface->editFamilymem($id);
        if(!$family_mem)
        {
            return redirect()->back()->with('error','Something went wrong');
        }

        return view('member.editfamilymem',compact('family_mem'));
    }

    public function update_familymem(Request $request)
    {
        $status = $this->familymemInterface->updateFamilymem($request);
        if($status)
        {
            return redirect()->route('member.allfamilymem')->with('success','Family Member Edited successfully');
        }
        else
        {
            return redirect()->back()->with('error','Something went wrong');
        }
    }
}
