<?php

namespace App\Http\Controllers;

use App\Http\Requests\StaffRequest;
use App\Interfaces\StaffInterface;
use App\Models\Staff;
use GrahamCampbell\ResultType\Result;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class StaffController extends Controller
{
    protected $staffInterface;
    public function __construct(StaffInterface $staffInterface)
    {
        $this->staffInterface = $staffInterface;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        if ($request->ajax()) {
            return $this->staffInterface->allStaffs();
        }
        return view('cmember.staffs');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('cmember.addstaff');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StaffRequest $request)
    {
        //
        $request->validated();
        $password = Str::random(8);
        $status = $this->staffInterface->addStaff($request,$password);
        if($status)
            $work = $request->work ? '('.$request->work.')' : '';
            $details = [
                'title' => 'Mail from ISocietyClub.com',
                'position' => $request->position.$work,
                'password' => $password
            ];
            Mail::to('shubham.v@simformsolutions.com')->send(new \App\Mail\StaffPasswordMail($details)); //$request->email for emaill
        return redirect()->route('member.staffs.index')->with('success',$request->position.$work.' added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Staff $staff)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Staff $staff)
    {
        //
        return view('cmember.editstaff',compact('staff'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StaffRequest $request, Staff $staff)
    {
        //
        $request->validated();
        $status = $this->staffInterface->editStaff($request,$staff);
        $work = $request->work ? '('.$request->work.')' : '';
        if($status)
            return redirect()->route('member.staffs.index')->with('success',$request->position.$work.' edited successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Staff $staff)
    {
        //
        $status = $this->staffInterface->deleteStaff($staff);
        if($status)
            return redirect()->route('member.staffs.index')->with('success','staff deleteted successfully');
        else
            return redirect()->route('member.staffs.index')->with('error','something went wrong');
    }

    public function getPassword()
    {
        //
        return view('cmember.setpassword');
    }

    public function setPassword(StaffRequest $request)
    {
        //
        $request->validated();
        $status = $this->staffInterface->setPassword($request);
        return redirect()->route('staff.home');
    }
}
