<?php

namespace App\Repository;

use App\Interfaces\ComplaintInterface;
use App\Models\Complaint;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Hash;


class ComplaintRepository implements ComplaintInterface
{
    public function __construct()
    {
    }
    public function addComplaint($request)
    {
        $complaint = Complaint::create([
            'title' =>  $request->title,
            'description' =>  $request->description,
            'category' => $request->category,
            'reg_date' =>  date('Y-m-d H:i:s', strtotime($request->reg_date)),
            'status' =>  'In Progress',
            'remarks' =>  $request->remarks,
            'user_id' => Auth::user()->id,
        ]);

        if ($complaint) {
            return true;
        } else {
            return false;
        }
    }
    public function showComplaint($request)
    {
        $data = Complaint::where('user_id', Auth::user()->id)->get();
        return DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('status', function ($row) {
                if($row->status == 'In Progress')
                {
                    $status ='<span class="label label-primary">'.$row->status.'</span>';
                }
                elseif($row->status == 'Resolved')
                {
                    $status ='<span class="label label-success">'.$row->status.'</span>';
                }

                return $status;
            })
            ->addColumn('action', function ($row) {

                $btn = '<form action="' . route('member.complaints.destroy', [$row->id]) . '" method="POST">';
                $btn .= '<input type="hidden" name="_method" value="DELETE"><input type="hidden" name="_token" value="' . csrf_token() . '">';
                $btn .= '<a href="' . route('member.complaints.edit', [$row->id]) . '" class="edit btn btn-primary btn-rounded mx-4" style="width:78px;">Edit</a>';
                // @method('DELETE')
                $btn .= '<button type="submit" class="edit btn btn-danger btn-rounded mx-3" style="width:78px;">Delete</button>';
                $btn .= '</form>';


                return $btn;
            })
            ->rawColumns(['status','action'])
            ->make(true);
    }
    public function deleteComplaint($complaint)
    {
        $c = $complaint->delete();
        if($c)
        {
            return true;
        }
        else
        {
            return false;
        }
    }
    public function updateComplaint($request,$complaint)
    {
        $c = $complaint->update($request->except('reg_date','status'));
        $complaint->update(['reg_date' => date('Y-m-d H:i:s', strtotime($request->reg_date)),'status' => 'Resolved']);

        if($c)
        {
            return true;
        }
        else
        {
            return false;
        }



    }
}
