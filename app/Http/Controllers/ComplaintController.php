<?php

namespace App\Http\Controllers;


use App\Models\Complaint;
use App\Interfaces\ComplaintInterface;
use Illuminate\Http\Request;

class ComplaintController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $complaintInterface;

    public function __construct(ComplaintInterface $complaintInterface)
    {

        $this->complaintInterface = $complaintInterface;
    }
    public function index(Request $request)
    {
        if($request->ajax())
        {
            return $this->complaintInterface->showComplaint($request);
        }
        return view('complaint.allcomplaint');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('complaint.addcomplaint');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $status = $this->complaintInterface->addComplaint($request);
        if($status)
        {
        return redirect()->route('member.complaints.index')->with('success','Complaint Added successfully');
        }
        else
        {
            return redirect()->back()->with('error','Something went wrong');
        }
        //echo "<script>alert('done');</script>";

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Complaint $complaint)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Complaint $complaint)
    {
        return view('complaint.editcomplaint',compact('complaint'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Complaint $complaint)
    {
        $status = $this->complaintInterface->updateComplaint($request,$complaint);
        if($status)
        {
            return redirect()->route('member.complaints.index')->with('success','Complaint Edited successfully');
        }
        else
        {
            return redirect()->back()->with('error','Something went wrong');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Complaint $complaint)
    {
        $status = $this->complaintInterface->deleteComplaint($complaint);
        if($status)
        {
        return redirect()->back()->with('success','Complaint Deleted successfully');
        }
        else
        {
            return redirect()->back()->with('error','Something went wrong');
        }
    }
}
