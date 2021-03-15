<?php

namespace App\Http\Controllers;

use App\Http\Requests\VisitorRequest;
use App\Interfaces\MemberInterface;
use App\Interfaces\VisitorInterface;
use App\Models\Visitor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class VisitorController extends Controller
{
    protected $memberInterface;
    protected $visitorInterface;
    public function __construct(MemberInterface $memberInterface, VisitorInterface $visitorInterface)
    {
        $this->memberInterface = $memberInterface;
        $this->visitorInterface = $visitorInterface;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //

        if ($request->ajax())
            return $this->visitorInterface->getvisitors();
        if (Route::is('staff.visitors.parkings'))
            return view('security.parkings');
        return view('security.visitors');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $members = $this->memberInterface->getSocietyMember();
        return view('security.entryofvisitor', compact('members'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(VisitorRequest $request)
    {
        //
        $request->validated();
        $status = $this->visitorInterface->addVisitor($request);
        if ($status)
            return redirect()->route('staff.visitors.index')->with('success', 'Entry of visitor done');
        else
            return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\visitor $visitor
     * @return \Illuminate\Http\Response
     */
    public function show(Visitor $visitor)
    {
        //

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\visitor $visitor
     * @return \Illuminate\Http\Response
     */
    public function edit(Visitor $visitor)
    {
        //
        $members = $this->memberInterface->getSocietyMember();
        return view('security.editvisitor', compact(['members', 'visitor']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\visitor $visitor
     * @return \Illuminate\Http\Response
     */
    public function update(VisitorRequest $request, Visitor $visitor)
    {
        //
        $request->validated();
        $status = $this->visitorInterface->editVisitor($request, $visitor);
        if ($status)
            return redirect()->route('staff.visitors.index')->with('success', 'Visitor details updated successfully');
        else
            return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\visitor $visitor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Visitor $visitor)
    {
        //
    }

    /**
     *
     * @param  \App\Models\visitor $visitor
     * @return \Illuminate\Http\Response
     */
    public function checkout(Visitor $visitor)
    {
        $visitor->update(['exit_time' => now()]);
        return redirect()->back()->with('success', 'Visitor ' . $visitor->name . ' check out');
    }
}
