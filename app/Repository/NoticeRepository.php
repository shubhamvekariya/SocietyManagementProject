<?php
namespace App\Repository;
use App\Interfaces\NoticeInterface;
use App\Models\Notice;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Hash;

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
            'society_id' => Auth::user()->id,
        ]);
        if($notice)
        {
            return true;
        }
        else
        {
            return false;
        }

    }
    /*public function showNotice($request)
    {

    }*/
    public function deleteNotice($notice)
    {
        $n = $notice->delete();
        if($n)
        {
            return true;
        }
        else
        {
            return false;
        }
    }
    public function updateNotice($request,$notice)
    {
        $n = $notice->update($request->all());
        if($n)
        {
            return true;
        }
        else
        {
            return false;
        }
    }
}
