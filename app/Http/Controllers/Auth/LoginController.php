<?php

namespace App\Http\Controllers\Auth;

use App\Models\Society;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class LoginController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('guest:society')->except('destroy');;
    }

    public function show_login()
    {
        return view('auth.login');
    }

    public function check_login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
        if (Auth::guard('society')->attempt($request->only('email', 'password'),$request->filled('rememberme'))) {
            $user = Auth::guard('society')->user();
            $user->assignRole('secretary');
            $request->session()->regenerate();
            return redirect()->route('society.home');
        }else{
            return redirect()->back()->with('danger','Invalid credentials');
        }
    }

    public function show_register()
    {
        return view('auth.register');
    }

    public function create_society(Request $request)
    {
        $request->validate([
            'society_name' => 'required',
            'country' => 'required',
            'email' => 'required|unique:societies|email',
            'password' => 'required_with:password_confirmation|confirmed|min:8|max:16',
            'phoneno' => 'required',
        ]);

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
        return redirect()->route('login.society');
    }

    public function destroy(Request $request)
    {
        if(Auth::guard('society')->check())
            $url = 'login.society';
        else
            $url = 'Home';
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route($url);
    }
}
