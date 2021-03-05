<?php
namespace App\Repository;
use App\Interfaces\RuleInterface;
use App\Models\Rule;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Hash;


class RuleRepository implements RuleInterface
{
    public function __construct()
    {

    }
    public function addRule($request)
    {
        $rules = Rule::create([
            'description' =>  $request->description,
            'society_id' => Auth::user()->id,
        ]);
        if($rules)
        {
            return true;
        }
        else
        {
            return false;
        }

    }

    public function showRule($request)
    {

            $data = Rule::all();
            return DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
                            $btn = '<a href="'.route('society.edit_rule',$row['id']).'" class="edit btn btn-primary btn-rounded mx-4" style="width:78px;">Edit</a>';
                            $btn .= '<a href="'.route('society.delete_rule',$row['id']).'" class="edit btn btn-danger btn-rounded mx-3" style="width:78px;">Delete</a>';
                            return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);

    }

    public function deleteRule($id)
    {
        $rules = Rule::findOrFail($id);
        $rules->delete();

        if($rules->trashed())
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    public function editRule($id)
    {
        $rules = Rule::findOrFail($id);
        return $rules;

    }

    public function updateRule($request)
    {
        $rules=Rule::find($request->rid);
        $rules->description = $request->description;
        $rules->save();

        if($rules)
        {
            return true;
        }
        else
        {
            return false;
        }

    }
}
?>
