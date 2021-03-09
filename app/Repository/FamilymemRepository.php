<?php
namespace App\Repository;
use App\Interfaces\FamilymemInterface;
use App\Models\Family;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Hash;


class FamilymemRepository implements FamilymemInterface
{
    public function __construct()
    {

    }

    public function addFamilymem($request)
    {
        $family_mem = Family::create([
            'name' =>  $request->name,
            'age' =>  $request->age,
            'contact_no' =>  $request->contact_no,
            'email' =>  $request->email,
            'gender' =>  $request->gender,
            'user_id' => Auth::user()->id,
        ]);

        if($family_mem)
        {
            return true;
        }
        else
        {
            return false;
        }

    }

    public function showFamilymem($request)
    {
        $data = Family::where('user_id',Auth::user()->id)->get();
        return DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('action', function($row){
                    $btn = '<a href="'.route('member.editfamilymem',$row['id']).'" class="edit btn btn-primary btn-rounded mx-4" style="width:78px;">Edit</a>';
                    $btn .= '<a href="'.route('member.deletefamilymem',$row['id']).'" class="edit btn btn-danger btn-rounded mx-3" style="width:78px;">Delete</a>';
                    return $btn;
            })
            ->rawColumns(['action'])
            ->make(true);
    }

    public function deleteFamilymem($id)
    {
        $family_mem = Family::findOrFail($id);
        $family_mem->delete();

        if($family_mem->trashed())
        {
            return true;
        }
        else
        {
            return false;
        }
    }
    public function editFamilymem($id)
    {
        $family_mem = Family::findOrFail($id);
        return $family_mem;
    }

    public function updateFamilymem($request)
    {
        $family_mem=Family::find($request->fid);;
        $family_mem->name = $request->name;
        $family_mem->email = $request->email;
        $family_mem->contact_no = $request->contact_no;
        $family_mem->age = $request->age;
        $family_mem->gender = $request->gender;

        $family_mem->save();
        if($family_mem)
        {
            return true;
        }
        else
        {
            return false;
        }
    }


}
