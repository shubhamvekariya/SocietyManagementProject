<?php

namespace App\Http\Controllers;

use App\Models\Meeting;
use App\Interfaces\MeetingInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\DataTables;
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
            /*$data = Meeting::all();
            return DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){

                            $btn = '<form action="'.route('society.meetings.destroy',[$row->id]).'" method="POST">';
                            $btn .= '<input type="hidden" name="_method" value="DELETE"><input type="hidden" name="_token" value="'.csrf_token().'">';
                            $btn .= '<a href="'.route('society.meetings.edit',[$row->id]).'" class="edit btn btn-primary btn-rounded mx-4" style="width:78px;">Edit</a>';
                           // @method('DELETE')
                            $btn .= '<button type="submit" class="edit btn btn-danger btn-rounded mx-3" style="width:78px;">Delete</button>';
                            $btn .= '</form>';


                            return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);*/
            return $this->meetingInterface->showMeeting($request);
        }
        return view('society.allmeeting');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('society.addmeeting');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(meetingValidation $request)
    {
        // Meeting::create($request->all());
        /*Meeting::create([
            'title' =>  $request->title,
            'date' =>  $request->date,
            'start_time' =>  $request->start_time,
            'end_time' =>  $request->end_time,
            'place' =>  $request->place,
            'society_id' => Auth::user()->id,
        ]);*/
        $status = $this->meetingInterface->addMeeting($request);
        if ($status) {
            return redirect()->route('society.meetings.index')->with('success', 'Meeting created successfully');
        } else {
            return redirect()->back()->with('error', 'Something went wrong');
        }

        //echo "<script>alert('Meeting Added');</script>";


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
        return view('society.editmeeting', compact('meeting'));
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
            return redirect()->route('society.meetings.index')->with('success', 'Meeting Edited successfully');
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


        //echo "<script>alert('Meeting Deleted');</script>";


    }
}
