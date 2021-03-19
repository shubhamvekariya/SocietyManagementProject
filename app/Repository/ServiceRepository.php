<?php

namespace App\Repository;

use App\Interfaces\ServiceInterface;
use App\Models\Service;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\DataTables;

class ServiceRepository implements ServiceInterface
{
    public function __construct()
    {
    }

    public function addService($request)
    {
        $service = Service::create([
            'name' =>  $request->name,
            'position' =>  $request->position,
            'mobile_no' =>  $request->mobile_no,
            'society_id' => Auth::user()->id,
        ]);
        if ($service) {
            return true;
        } else {
            return false;
        }
    }
    public function showService($request)
    {

        $data = Service::where('society_id', Auth::user()->id)->get();
        return DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('action', function ($row) {
                $btn = '<form action="' . route('society.services.destroy', [$row->id]) . '" method="POST">';
                $btn .= '<input type="hidden" name="_method" value="DELETE"><input type="hidden" name="_token" value="' . csrf_token() . '">';
                $btn .= '<a href="' . route('society.services.edit', [$row->id]) . '" class="edit btn btn-primary btn-rounded mx-4" style="width:78px;">Edit</a>';
                $btn .= '<button type="submit" class="edit btn btn-danger btn-rounded mx-3" style="width:78px;">Delete</button>';
                $btn .= '</form>';
                return $btn;
            })
            ->rawColumns(['action'])
            ->make(true);
    }

   public function deleteService($service)
    {
        $s = $service->delete();
        if ($s) {
            return true;
        } else {
            return false;
        }
    }

    public function updateService($request, $service)
    {
        $s = $service->update($request->except('society_id'));
        if ($s) {
            return true;
        } else {
            return false;
        }
    }

    public function showServiceMem($request)
    {
        $user = Auth::user();
        dd($user);
        if ($user->hasAnyRole('member'))
        {
        $data = Service::where(Auth::user()->id)->get();
        return DataTables::of($data)
            ->addIndexColumn()
            ->make(true);
        }
    }
}

