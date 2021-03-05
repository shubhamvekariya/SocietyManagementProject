<?php

namespace App\Http\Controllers;

use App\Http\Requests\StaffRequest;
use App\Interfaces\StaffInterface;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class StaffController extends Controller
{
    protected $staffInterface;
    public function __construct(StaffInterface $staffInterface)
    {
        $this->staffInterface = $staffInterface;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('cmember.addstaff');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StaffRequest $request)
    {
        //
        $request->validated();
        $password = Str::random(8);
        $status = $this->staffInterface->addStaff($request,$password);
        if($status)
            $work = '('.$request->work.')' ?? '';
            $details = [
                'title' => 'Mail from ISocietyClub.com',
                'position' => $request->position.$work,
                'password' => $password
            ];
            Mail::to('shubham.v@simformsolutions.com')->send(new \App\Mail\StaffPasswordMail($details)); //$request->email for emaill
        return 'Add staff successfully';
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
