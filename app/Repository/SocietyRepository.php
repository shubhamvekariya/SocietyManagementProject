<?php
namespace App\Repository;

use App\Interfaces\SocietyInterface;
use App\Models\Society;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

/**
 * Class UserRepository
 * @package app\Repository
 */
class SocietyRepository implements SocietyInterface
{

    public function __construct()
    {
    }

    public function addSociety($request)
    {

        $society = Society::create([
            'society_name' => $request->society_name,
            'address' => $request->address,
            'country' => explode("(", $request->country, 2)[0],
            'state' => explode("(", $request->state, 2)[0],
            'city' => explode("(", $request->city, 2)[0],
            'secretary_name' => $request->fname." ".$request->lname,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'phoneno' => $request->phoneno
        ]);
        if(!$society)
            return back()->withError('Something went wrong. please try again!!')->withInput();
        $society->assignRole('secretary');
        return true;
    }
    public function checkLogin($email, $password, $rememberme)
    {
        if (Auth::guard('society')->attempt(['email' => $email, 'password' => $password],$rememberme)) {
            return true;
        }
        return false;
    }

}
