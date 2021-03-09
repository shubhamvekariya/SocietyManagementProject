<?php
namespace App\Repository;
use App\Interfaces\MeetingInterface;
use App\Models\Meeting;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Hash;

class MeetingRepository implements MeetingInterface
{
    public function __construct()
    {

    }

    public function addMeeting($request)
    {
        $meeting = Meeting::create([
            'title' =>  $request->title,
            'date' =>  $request->date,
            'start_time' =>  $request->start_time,
            'end_time' =>  $request->end_time,
            'place' =>  $request->place,
            'society_id' => Auth::user()->id,
        ]);

        if($meeting)
        {
            return true;
        }
        else
        {
            return false;
        }

    }
    public function showMeeting($request)
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

    public function deleteMeeting($meeting)
    {
        $m = $meeting->delete();
        if($m)
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    public function updateMeeting($request,$meeting)
    {
        $m = $meeting->update($request->all());
        if($m)
        {
            return true;
        }
        else
        {
            return false;
        }



    }



}
