<?php
namespace App\Repository;

use App\Interfaces\MemberInterface;
use App\Interfaces\StaffInterface;
use App\Models\Staff;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
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
            if($request->position == 'secutiry')
                $staff->assignRole('security');
            else
                $staff->assignRole('staff');
            
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

}
