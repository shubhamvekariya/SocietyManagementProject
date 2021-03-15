<?php

namespace App\Repository;

use App\Interfaces\AssetInterface;
use App\Models\Asset;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\DataTables;


class AssetRepository implements AssetInterface
{
    public function __construct()
    {
    }
    public function addAsset($request)
    {
        $asset = Asset::create([
            'name' =>  $request->name,
            'start_time' =>  date('Y-m-d H:i:s', strtotime($request->start_time)),
            'end_time' =>  date('Y-m-d H:i:s', strtotime($request->end_time)),
            'assets' =>  $request->assets,
            'func_details' =>  $request->func_details,
            'charges' =>  $request->charges,
            'user_id' => Auth::user()->id,
        ]);
        if ($asset) {
            return true;
        } else {
            return false;
        }
    }
    public function showAsset($request)
    {

        $data = Asset::where('user_id', Auth::user()->id)->get();
        return DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('action', function ($row) {

                $btn = '<form action="' . route('member.assets.destroy', [$row->id]) . '" method="POST">';
                $btn .= '<input type="hidden" name="_method" value="DELETE"><input type="hidden" name="_token" value="' . csrf_token() . '">';
                $btn .= '<a href="' . route('member.assets.edit', [$row->id]) . '" class="edit btn btn-primary btn-rounded mx-4" style="width:78px;">Edit</a>';
                $btn .= '<button type="submit" class="edit btn btn-danger btn-rounded mx-3" style="width:78px;">Delete</button>';
                $btn .= '</form>';


                return $btn;
            })
            ->rawColumns(['action'])
            ->make(true);
    }
    public function deleteAsset($asset)
    {
        $a = $asset->delete();
        if ($a) {
            return true;
        } else {
            return false;
        }
    }
    public function updateAsset($request, $asset)
    {
        $a = $asset->update($request->except('start_time', 'end_time'));
        $asset->update(['start_time' => date('Y-m-d H:i:s', strtotime($request->start_time)), 'end_time' => date('Y-m-d H:i:s', strtotime($request->end_time))]);

        if ($a) {
            return true;
        } else {
            return false;
        }
    }
}
