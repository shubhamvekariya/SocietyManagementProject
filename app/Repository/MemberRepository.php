<?php
namespace App\Repository;

use App\Interfaces\MemberInterface;
use App\Models\Apartment;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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
                return true;
        }
        return back()->withError('Something went wrong. please try again!!')->withInput();
    }
    public function checkLogin($email, $password, $rememberme)
    {
        if (Auth::attempt(['email' => $email, 'password' => $password],$rememberme)) {
            $user = Auth::user();
            $user->assignRole('member');
            return true;
        }
        return false;
    }

}
