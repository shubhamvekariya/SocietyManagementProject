<?php

namespace App\Http\Controllers;

use App\Events\Approveuser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Pusher\Pusher;

class MemberController extends Controller
{
    //
    public function index()
    {
        return view('member.index');
    }

    public function approve()
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
        $member =Auth::user();
        $data['message'] = 'New member has registered with email '.$member->email;
        $data['approvelink'] = route('society.approvemember',$member->id);
        $data['rejectlink'] = route('society.rejectmember',$member->id);
        $pusher->trigger('approve-channel-'.$member->apartment->society->id, 'approve-event', $data);
        return view('member.approve');
    }
}
