<?php

namespace App\Repository;

use App\Interfaces\VisitorInterface;
use App\Models\Parking;
use App\Models\User;
use App\Models\Visitor;
use Illuminate\Support\Facades\Auth;
use Pusher\Pusher;
use Yajra\DataTables\Facades\DataTables;

/**
 * Class UserRepository
 * @package app\Repository
 */
class VisitorRepository implements VisitorInterface
{

    public function __construct()
    {
    }
    public function addVisitor($request)
    {
        $visitor = Visitor::create([
            'name' => $request->name,
            'phoneno' => $request->phoneno,
            'user_id' => $request->member,
            'address' => $request->address,
            'reason_to_meet' => $request->reason,
            'entry_time' => $request->entry_time
        ]);
        if ($visitor) {
            if( $request->vehicle_no)
            {
                $parking = Parking::create([
                    'vehicle_no' => $request->vehicle_no,
                    'type' => $request->type,
                    'spot' => $request->spot,
                    'visitor_id' => $visitor->id
                ]);
            }

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
            $member = User::findOrFail($request->member);
            $data['message'] = 'New visitor ' . $request->name.' at your door';
            $data['approvelink'] = route('member.approvevisitor', $visitor->id);
            $data['rejectlink'] = route('member.rejectvisitor', $visitor->id);
            $pusher->trigger('approve-visitor-channel-' . $member->id, 'approve-visitor-event', $data);
            $details = [
                'body' => 'Visitor '.$visitor->name.' need to approve!<br><form class="text-center" action="'.route('member.needapprovevisitor').'" method="GET"><button type="submit" class="btn btn-primary mb-0">Approve</button></form>',
            ];
            $member->notify(new \App\Notifications\Approve($details));
            return true;
        }
        return false;
    }

    public function getVisitors()
    {
        $user = Auth::user();
        if ($user->hasAnyRole('security', 'staff_security'))
            $visitors = Visitor::select('parking_details.*', 'visitors_details.*')->leftjoin('parking_details', 'visitors_details.id', '=', 'parking_details.visitor_id')->join('users', 'users.id', '=', 'visitors_details.user_id')->join('apartments', 'users.id', '=', 'apartments.user_id')->where('apartments.society_id', $user->society_id)->where('visitors_details.approved_at','!=',null)->get();
        if ($user->hasAnyRole('member'))
            $visitors = Visitor::select('parking_details.*', 'visitors_details.*')->leftjoin('parking_details', 'visitors_details.id', '=', 'parking_details.visitor_id')->where('visitors_details.user_id', $user->id)->where('visitors_details.approved_at','!=', null)->get();
        return DataTables::of($visitors)
            ->addIndexColumn()
            ->addColumn('memberdetails', function ($row) {
                $memberdata = $row->user->name.' ('.$row->user->apartment->name_or_number;
                if($row->user->apartment->floor_no)
                    $memberdata .= ' - '.$row->user->apartment->floor_no;
                $memberdata .= ')';
                return $memberdata;
            })
            ->addColumn('action', function ($row) {
                $btn = '<form action="' . route('staff.visitors.destroy', $row['id']) . '" method="POST">';
                $btn .= '<input type="hidden" name="_method" value="DELETE"> <input type="hidden" name="_token" value="' . csrf_token() . '">';
                $btn .= '<a href="' . route('staff.visitors.edit', $row['id']) . '" class="edit btn btn-primary btn-rounded mx-4" style="width:78px;">Edit</a>';
                $btn .= '<button class="edit btn btn-danger btn-rounded mx-3" style="width:78px;">Delete</a>';
                $btn .= '</form>';
                return $btn;
            })
            ->rawColumns(['action'])
            ->make(true);
    }

    public function editVisitor($request,$visitor)
    {
        $visitor->update([
            'name' => $request->name,
            'phoneno' => $request->phoneno,
            'user_id' => $request->member,
            'address' => $request->address,
            'reason_to_meet' => $request->reason
        ]);

        if( $request->vehicle_no)
        {
            $visitor->parking->update([
                'vehicle_no' => $request->vehicle_no,
                'type' => $request->type,
                'spot' => $request->spot
            ]);
        }
        return true;
    }
}
