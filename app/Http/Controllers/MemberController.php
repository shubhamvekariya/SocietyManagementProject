<?php

namespace App\Http\Controllers;

use App\Interfaces\ApproveInterface;

class MemberController extends Controller
{
    //
    protected $approveInterface;
    public function __construct(ApproveInterface $approveInterface)
    {
        $this->approveInterface = $approveInterface;
    }

    public function index()
    {
        return view('member.index');
    }

    public function approve()
    {
        $this->approveInterface->approval();
        return view('member.approve');
    }
}
