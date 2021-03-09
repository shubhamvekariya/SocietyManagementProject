<?php
namespace App\Repository;

use App\Interfaces\MemberInterface;
use App\Interfaces\StaffInterface;
use App\Models\Staff;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Yajra\DataTables\Facades\DataTables;

/**
 * Class UserRepository
 * @package app\Repository
 */
class StaffRepository implements StaffInterface
{

    public function __construct()
    {
    }

    public function addStaff($request,$password)
    {
        $user_id = null;
        $society_id = null;
        if($request->usage == 'personal')
            $user_id = Auth::user()->id;
        else
            $society_id = Auth::user()->apartment->society->id;
        $staff = Staff::create([
            'name' => $request->name,
            'email' => $request->email,
            'age' => $request->age,
            'phoneno' => $request->phoneno,
            'gender' => $request->gender,
            'position' => $request->position,
            'work' => $request->work,
            'society_id' => $society_id,
            'user_id' => $user_id,
            'password' => Hash::make($password),
        ]);

        if($staff)
        {
            if($request->position == 'security')
            {
                $role = Role::findByName('security','staff_security');
                $role->givePermissionTo('set password');
                $staff->assignRole($role);
            }
            else
            {
                $role = Role::findByName('staff','staff_security');
                $role->givePermissionTo('set password');
                $staff->assignRole($role);
            }

            return true;
        }
        return back()->withError('Something went wrong. please try again!!')->withInput();
    }

    public function checkLogin($email, $password, $rememberme)
    {
        if (Auth::guard('staff_security')->attempt(['email' => $email, 'password' => $password],$rememberme)) {
            return true;
        }
        return false;
    }

    public function allStaffs()
    {
        $user = Auth::user();
        if($user->hasAnyRole('committeemember'))
            $staffs = Staff::where('society_id',$user->apartment->society->id)->orWhere('user_id',$user->id)->get();
        else if($user->hasAnyRole('member'))
            $staffs = Staff::Where('user_id',$user->id)->get();
            return DataTables::of($staffs)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
                            $btn = '<form action="'.route('member.staffs.destroy',$row['id']).'" method="POST">';
                            $btn .= '<input type="hidden" name="_method" value="DELETE"> <input type="hidden" name="_token" value="'.csrf_token().'">';
                            $btn .= '<a href="'.route('member.staffs.edit',$row['id']).'" class="edit btn btn-primary btn-rounded mx-4" style="width:78px;">Edit</a>';
                            $btn .= '<button class="edit btn btn-danger btn-rounded mx-3" style="width:78px;">Delete</a>';
                            $btn .= '</form>';
                            return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
    }

    public function editStaff($request, $staff)
    {
        $work = $request->work;
        if($request->position == 'security')
            $work = null;
        $user_id = null;
        $society_id = null;
        if($request->usage == 'personal')
            $user_id = Auth::user()->id;
        else
            $society_id = Auth::user()->apartment->society->id;
        $staff->update($request->all());
        $staff->update(['society_id'=> $society_id, 'user_id'=> $user_id, 'work' => $work ]);
        return true;
    }

    public function deleteStaff($staff)
    {
        $staff->delete();
        if($staff->trashed())
            return true;
        return false;
    }

    public function setPassword($request)
    {
        if(Auth::user()->hasRole('security','staff_security'))
            $role = Role::findByName('security','staff_security');
        else
            $role = Role::findByName('staff','staff_security');
        $role->revokePermissionTo('set password', 'staff_security');
        $staff = Staff::findOrFail(Auth::user()->id);
        Auth::user()->assignRole($role);
        $staff->update(['password'=> Hash::make($request->password)]);
        return true;
    }
}
