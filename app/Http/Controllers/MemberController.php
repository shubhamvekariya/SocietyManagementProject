<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthRequest;
use App\Interfaces\ApproveInterface;
use App\Interfaces\FamilymemInterface;
use Illuminate\Http\Request;
use App\Http\Requests\FamilymemValidation;
use App\Http\Requests\VisitorRequest;
use App\Interfaces\MemberInterface;
use App\Interfaces\VisitorInterface;

class MemberController extends Controller
{
    //
    protected $approveInterface;
    protected $familymemInterface;
    protected $memberInterface;
    protected $visitorInterface;

    public function __construct(ApproveInterface $approveInterface, FamilymemInterface $familymemInterface, MemberInterface $memberInterface,VisitorInterface $visitorInterface)
    {
        $this->approveInterface = $approveInterface;
        $this->familymemInterface = $familymemInterface;
        $this->memberInterface = $memberInterface;
        $this->visitorInterface = $visitorInterface;
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

    public function approvevisitor($visitor_id)
    {
        $status = $this->approveInterface->approveVisitor($visitor_id);
        if ($status)
            return redirect()->back()->with('approvevisitorsuccess', 'Visitor approved successfully');
        else
            return redirect()->back()->with('approvevisitorerror', 'Something went wrong');
    }

    public function rejectvisitor($visitor_id)
    {
        $status = $this->approveInterface->rejectVisitor($visitor_id);
        if ($status)
            return redirect()->back()->with('approvevisitorsuccess', 'Visitor rejected');
        else
            return redirect()->back()->with('approvevisitorerror', 'Something went wrong');
    }

    public function add_familymem(FamilymemValidation $request)
    {
        $status = $this->familymemInterface->addFamilymem($request);
        if ($status) {
            return redirect()->route('member.allfamilymem')->with('success', 'Family Member added successfully');
        } else {
            return redirect()->back()->with('error', 'Something went wrong');
        }
    }

    public function show_familymem(Request $request)
    {
        if ($request->ajax()) {
            return $this->familymemInterface->showFamilymem($request);
        }
        return view('member.allfamilymem');
    }

    public function delete_familymem($id)
    {
        $status = $this->familymemInterface->deleteFamilymem($id);
        if ($status) {
            return redirect()->back()->with('success', 'Family Member Deleted successfully');
        } else {
            return redirect()->back()->with('error', 'Something went wrong');
        }
    }

    public function edit_familymem($id)
    {
        $family_mem = $this->familymemInterface->editFamilymem($id);
        if (!$family_mem) {
            return redirect()->back()->with('error', 'Something went wrong');
        }

        return view('member.editfamilymem', compact('family_mem'));
    }

    public function update_familymem(Request $request)
    {
        $status = $this->familymemInterface->updateFamilymem($request);
        if ($status) {
            return redirect()->route('member.allfamilymem')->with('success', 'Family Member Edited successfully');
        } else {
            return redirect()->back()->with('error', 'Something went wrong');
        }
    }

    public function disapprovevisitors(Request $request)
    {
        if ($request->ajax()) {
            return $this->approveInterface->disapprovevisitors();
        }

        return view('member.approvevisitors');
    }

    public function previsitor()
    {
        return view('security.entryofvisitor');
    }
    public function preregistervisitor(VisitorRequest $request)
    {
        $request->validated();
        $status = $this->visitorInterface->addVisitor($request);
        if ($status)
            return redirect()->route('member.visitors')->with('success', 'Entry of visitor done');
        else
            return redirect()->back();
    }

    public function getPassword()
    {
        //
        return view('cmember.setpassword');
    }

    public function setPassword(AuthRequest $request)
    {
        //
        $request->validated();
        $status = $this->memberInterface->setPassword($request);
        return redirect()->route('member.home');
    }

    public function saveToken(Request $request)
    {
        auth()->user()->update(['device_token' => $request->token]);
        return response()->json(['token saved successfully.']);
    }
}
