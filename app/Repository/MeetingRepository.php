<?php

namespace App\Repository;

use App\Interfaces\MeetingInterface;
use App\Models\Meeting;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\DataTables;

class MeetingRepository implements MeetingInterface
{
    public function __construct()
    {
    }

    public function addMeeting($request)
    {
        //$users = User::all()->except(Auth::id());
        //dd($users);
        $meeting = Meeting::create([
            'title' =>  $request->title,
            'description' =>  $request->description,
            'start_time' =>  date('Y-m-d H:i:s', strtotime($request->start_time)),
            'end_time' =>  date('Y-m-d H:i:s', strtotime($request->end_time)),
            'place' =>  $request->place,
            'society_id' => Auth::user()->apartment->society_id,
        ]);
        if ($meeting) {

            // SMS notification
            // $basic  = new \Nexmo\Client\Credentials\Basic('8e5576b8', 'harboJXLDKcG7ntT');
            //$client = new \Nexmo\Client($basic);

            // $message = $client->message()->send([
            //     'to' => '8401564660',
            //     'from' => 'ISocietyClub',
            //     'text' => 'Hello '.$member->name.', Request for new visitor '.$visitor->name.'. Approve here http://127.0.0.1:8000/approvevisitor/1'
            // ]);
            //dd($request->all());

            $users = User::select('users.*')->join('apartments', 'users.id', '=', 'apartments.user_id')->where('apartments.society_id', Auth::user()->apartment->society_id)->get();
            foreach ($users as $u) {
                $basic  = new \Nexmo\Client\Credentials\Basic('b055a611', 'hsubS9eN82UkNusj');
                $client = new \Nexmo\Client($basic);

                $client->message()->send([
                    'to' => (string)$u->phoneno,
                    'from' => 'Meeting Details',
                    'text' => 'Meeting Title : '. $meeting->title .'<br>Meeting Description : '.$meeting->description,
                ]);
            }
            return true;
        }
    }
    public function showMeeting($request)
    {

        $data = Meeting::where('society_id', Auth::user()->apartment->society_id)->get();
        return DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('action', function ($row) {
                $btn = '<form action="' . route('member.meetings.destroy', [$row->id]) . '" method="POST">';
                $btn .= '<input type="hidden" name="_method" value="DELETE"><input type="hidden" name="_token" value="' . csrf_token() . '">';
                $btn .= '<a href="' . route('member.meetings.edit', [$row->id]) . '" class="edit btn btn-primary btn-rounded mx-4" style="width:78px;">Edit</a>';
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
        if ($m) {
            return true;
        } else {
            return false;
        }
    }

    public function updateMeeting($request, $meeting)
    {
        $m = $meeting->update($request->except('start_time', 'end_time'));
        $meeting->update(['start_time' => date('Y-m-d H:i:s', strtotime($request->start_time)), 'end_time' => date('Y-m-d H:i:s', strtotime($request->end_time))]);
        if ($m) {
            return true;
        } else {
            return false;
        }
    }
}
