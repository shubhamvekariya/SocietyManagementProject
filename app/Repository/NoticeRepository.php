<?php

namespace App\Repository;

use App\Interfaces\NoticeInterface;
use App\Models\Notice;
use Illuminate\Support\Facades\Auth;

class NoticeRepository implements NoticeInterface
{
    public function __construct()
    {
    }
    public function addNotice($request)
    {
        $notice = Notice::create([
            'title' =>  $request->title,
            'description' =>  $request->description,
            'society_id' => Auth::user()->apartment->society_id,
        ]);
        if ($notice) {
            return true;
        } else {
            return false;
        }
    }
    public function deleteNotice($notice)
    {
        $n = $notice->delete();
        if ($n) {
            return true;
        } else {
            return false;
        }
    }
    public function updateNotice($request, $notice)
    {
        $n = $notice->update($request->all());
        if ($n) {
            return true;
        } else {
            return false;
        }
    }
}
