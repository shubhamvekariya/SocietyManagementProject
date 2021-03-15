<?php

namespace App\Http\Controllers;

use App\Models\Meeting;
use App\Interfaces\MeetingInterface;
use Illuminate\Http\Request;
use App\Http\Requests\meetingValidation;

class MeetingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $meetingInterface;

    public function __construct(MeetingInterface $meetingInterface)
    {

        $this->meetingInterface = $meetingInterface;
    }
    public function index(Request $request)
    {

        if ($request->ajax()) {
            return $this->meetingInterface->showMeeting($request);
        }
        return view('cmember.allmeeting');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('cmember.addmeeting');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(meetingValidation $request)
    {
        $status = $this->meetingInterface->addMeeting($request);
        if ($status) {
            return redirect()->route('member.meetings.index')->with('success', 'Meeting created successfully');
        } else {
            return redirect()->back()->with('error', 'Something went wrong');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Meeting  $meeting
     * @return \Illuminate\Http\Response
     */
    public function show(Meeting $meeting)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Meeting  $meeting
     * @return \Illuminate\Http\Response
     */
    public function edit(Meeting $meeting)
    {
        return view('cmember.editmeeting', compact('meeting'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Meeting  $meeting
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Meeting $meeting)
    {

        //$meeting->update($request->all());
        $status = $this->meetingInterface->updateMeeting($request, $meeting);
        if ($status) {
            return redirect()->route('member.meetings.index')->with('success', 'Meeting Edited successfully');
        } else {
            return redirect()->back()->with('error', 'Something went wrong');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Meeting  $meeting
     * @return \Illuminate\Http\Response
     */
    public function destroy(Meeting $meeting)
    {

        //$meeting->delete();
        $status = $this->meetingInterface->deleteMeeting($meeting);
        if ($status) {
            return redirect()->back()->with('success', 'Meeting Deleted successfully');
        } else {
            return redirect()->back()->with('error', 'Something went wrong');
        }
    }
}
