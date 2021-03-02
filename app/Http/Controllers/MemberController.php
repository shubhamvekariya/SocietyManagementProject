<?php

namespace App\Http\Controllers;

use App\Events\Approveuser;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    //
    public function index()
    {
        return view('member.index');
    }

    public function approve()
    {
        event(new Approveuser('hello world'));
        return view('member.approve');
    }
}
