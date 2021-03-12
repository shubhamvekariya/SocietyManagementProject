<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Notice;
use App\Interfaces\NoticeInterface;
use App\Http\Requests\NoticeValidation;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class NoticeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $noticeInterface;

    public function __construct(NoticeInterface $noticeInterface)
    {

        $this->noticeInterface = $noticeInterface;
    }

    public function index()
    { 
        $notices = Notice::where('society_id',Auth::user()->apartment->society_id)->paginate(12);
        return view('notice.allnotice',['notices' => $notices]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('notice.addnotice');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(NoticeValidation $request)
    {
        $status = $this->noticeInterface->addNotice($request);
        if ($status) {
            return redirect()->route('member.notices.index')->with('success', 'Notice Added successfully');
        } else {
            return redirect()->back()->with('error', 'Something went wrong');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Notice $notice)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Notice $notice)
    {
        //
        return view('notice.editnotice', compact('notice'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Notice $notice)
    {
        $status = $this->noticeInterface->updateNotice($request, $notice);
        if ($status) {
            return redirect()->route('member.notices.index')->with('success', 'Notice Edited successfully');
        } else {
            return redirect()->back()->with('error', 'Something went wrong');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Notice $notice)
    {
        //dd($notice);
        $status = $this->noticeInterface->deleteNotice($notice);
        if ($status) {
            return redirect()->route('member.notices.index')->with('success', 'Notice Deleted successfully');
            //echo "<script>alert('deleted');</script>";
        } else {
            return redirect()->back()->with('error', 'Something went wrong');
        }
    }
}
