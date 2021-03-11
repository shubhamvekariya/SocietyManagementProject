<?php

namespace App\Repository;

use App\Interfaces\ApproveInterface;
use App\Models\Society;
use App\Models\Staff;
use App\Models\User;
use App\Models\Visitor;
use Illuminate\Support\Facades\Auth;
use Pusher\Pusher;
use Yajra\DataTables\Facades\DataTables;

/**
 * Class ApproveRepository
 * @package app\Repository
 */
class ApproveRepository implements ApproveInterface
{

    public function __construct()
    {
    }
    public function approval()
    {
        $options = array(
            'cluster' => 'ap2',
            'encrypted' => true
        );
        $pusher = new Pusher(
            '6b723375502146131d40',
            '958aa14555a4cafd0847',
            '1164693',
            $options
        );
        $member = Auth::user();
        $data['message'] = 'New member has registered with email ' . $member->email;
        $data['approvelink'] = route('society.approvemember', $member->id);
        $data['rejectlink'] = route('society.rejectmember', $member->id);
        $pusher->trigger('approve-channel-' . $member->apartment->society->id, 'approve-event', $data);
    }

    public function approve($user_id)
    {
        $user = User::findOrFail($user_id);
        $user->approved_at = now();
        $user->save();
        if ($user->wasChanged())
            return true;
        return false;
    }

    public function reject($user_id)
    {
        $user = User::findOrFail($user_id);
        $user->apartment->delete();
        $user->delete();
        if ($user->trashed())
            return true;
        return false;
    }

    public function disapprovemembers()
    {
        $disapprovemembers = User::join('apartments', 'users.id', '=', 'apartments.user_id')->where('users.approved_at', null, 'and')->where('apartments.society_id', Auth::user()->id)->get();
        return DataTables::of($disapprovemembers)
            ->addIndexColumn()
            ->addColumn('action', function ($row) {
                $btn = '<a href="' . route('society.approvemember', $row['id']) . '" class="edit btn btn-primary btn-rounded mx-4" style="width:78px;">Approve</a>';
                $btn .= '<a href="' . route('society.rejectmember', $row['id']) . '" class="edit btn btn-danger btn-rounded mx-3" style="width:78px;">Reject</a>';
                return $btn;
            })
            ->rawColumns(['action'])
            ->make(true);
    }


    public function approveVisitor($visitor_id)
    {
        $visitor = Visitor::findOrFail($visitor_id);
        $visitor->approved_at = now();
        $society_id = Auth::user()->apartment->society_id;
        $users = Staff::where('society_id',$society_id)->get();
        $details = [
                'body' => 'Visitor '.$visitor->name.' approved',
        ];
        foreach($users as $user)
            $user->notify(new \App\Notifications\Approve($details));
        $visitor->save();
        if ($visitor->wasChanged())
            return true;
        return false;
    }

    public function rejectVisitor($visitor_id)
    {
        $user = Visitor::findOrFail($visitor_id);
        $user->parking->delete();
        $user->delete();
        if ($user->trashed())
            return true;
        return false;
    }
    public function disapprovevisitors()
    {
        $disapprovevisitors = Visitor::select('parking_details.*', 'visitors_details.*')->leftjoin('parking_details', 'visitors_details.id', '=', 'parking_details.visitor_id')->where('visitors_details.user_id', Auth::user()->id)->where('visitors_details.approved_at', null)->get();
        return DataTables::of($disapprovevisitors)
            ->addIndexColumn()
            ->addColumn('action', function ($row) {
                $btn = '<a href="' . route('member.approvevisitor', $row['id']) . '" class="edit btn btn-primary btn-rounded mx-4" style="width:78px;">Approve</a>';
                $btn .= '<a href="' . route('member.rejectvisitor', $row['id']) . '" class="edit btn btn-danger btn-rounded mx-3" style="width:78px;">Reject</a>';
                return $btn;
            })
            ->rawColumns(['action'])
            ->make(true);
    }
}
