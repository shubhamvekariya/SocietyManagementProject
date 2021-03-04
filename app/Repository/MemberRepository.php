<?php
namespace App\Repository;

use App\Interfaces\MemberInterface;
use App\Models\Apartment;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\Facades\DataTables;

/**
 * Class UserRepository
 * @package app\Repository
 */
class MemberRepository implements MemberInterface
{

    public function __construct()
    {
    }

    public function addMember($request)
    {

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'age' => $request->age,
            'phoneno' => $request->phoneno,
            'gender' => $request->gender,
            'password' => Hash::make($request->password),
        ]);
        if($user)
        {
            $apartment = Apartment::create([
                'name_or_number' => $request->name_or_number,
                'BHK' => $request->BHK,
                'floor_no' => $request->floor_no,
                'price' => $request->price,
                'society_id' => $request->society_id,
                'user_id' => $user->id
            ]);
            if($apartment)
            {
                $user->assignRole('member');
                return true;
            }
        }
        return back()->withError('Something went wrong. please try again!!')->withInput();
    }
    public function checkLogin($email, $password, $rememberme)
    {
        if (Auth::attempt(['email' => $email, 'password' => $password],$rememberme)) {
            return true;
        }
        return false;
    }

    public function getMembers()
    {
        $disapprovemembers = User::all();
            return DataTables::of($disapprovemembers)
                    ->addIndexColumn()
                    ->addColumn('committeemember', function($row){
                        if(!$row->hasRole('committeemember'))
                            $btn = '<a href="'.route('society.addcmember',$row['id']).'" class="edit btn btn-primary btn-rounded mx-5" style="width:78px;">Add</a>';
                        else
                            $btn = '<a href="'.route('society.removecmember',$row['id']).'" class="edit btn btn-danger btn-rounded mx-5" style="width:78px;">Remove</a>';
                        return $btn;
                    })
                    ->rawColumns(['committeemember'])
                    ->make(true);
    }
}
