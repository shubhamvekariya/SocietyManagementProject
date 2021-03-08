<?php

namespace App\Http\Controllers;

use App\Models\Meeting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\DataTables;

class MeetingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->ajax())
        {
            $data = Meeting::all();
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
                    ->make(true);
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
    public function store(Request $request)
    {
       // Meeting::create($request->all());
        Meeting::create([
            'title' =>  $request->title,
            'date' =>  $request->date,
            'start_time' =>  $request->start_time,
            'end_time' =>  $request->end_time,
            'place' =>  $request->place,
            'society_id' => Auth::user()->id,
        ]);
        return redirect()->route('society.meetings.index')->with('success','Meeting created successfully');

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
       // return view('society.allmeeting',compact('meeting'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Meeting  $meeting
     * @return \Illuminate\Http\Response
     */
    public function edit(Meeting $meeting)
    {
        //
        return view('society.editmeeting',compact('meeting'));

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
        //
        $meeting->update($request->all());
        return redirect()->route('society.allmeeting')->with('success','Meeting Edited successfully');
        //echo "<script>alert('Meeting Updated');</script>";


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Meeting  $meeting
     * @return \Illuminate\Http\Response
     */
    public function destroy(Meeting $meeting)
    {
        //$m = Meeting::findOrFail($meeting->id);
        $meeting->delete();
        return redirect()->back()->with('success','Meeting Deleted successfully');

        //echo "<script>alert('Meeting Deleted');</script>";


    }
}
