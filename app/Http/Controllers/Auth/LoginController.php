<?php

namespace App\Http\Controllers\Auth;

use App\Models\Society;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Interfaces\MemberInterface;
use App\Interfaces\SocietyInterface;
use Illuminate\Support\Facades\Auth;


class LoginController extends Controller
{
    protected $memberInterface;
    protected $societyInterface;
    //
    public function __construct(Request $request, MemberInterface $memberInterface,SocietyInterface $societyInterface)
    {
        if($request->segment(2) == 'society')
        {
            $this->societyInterface = $societyInterface;
            $this->middleware('guest:society')->except('destroy');
        }
        elseif($request->segment(2) == 'member')
        {
            $this->memberInterface = $memberInterface;
            $this->middleware('guest')->except('destroy');
        }
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
        if($request->segment(2) == 'society')
        {
            $login = $this->societyInterface->checkLogin($request->email, $request->password, $request->rememberme);
            if($login)
            {
                $request->session()->regenerate();
                return redirect()->route('society.home');
            }
        }
        if($request->segment(2) == 'member')
        {
            $login = $this->memberInterface->checkLogin($request->email, $request->password, $request->rememberme);
            if($login)
            {
                $request->session()->regenerate();
                return redirect()->route('member.home');
            }
        }
        return redirect()->back()->with('danger','Invalid credentials');
    }

    public function show_register(Request $request)
    {
        if($request->segment(2) == 'member')
        {
            $societies = Society::all();
            return view('auth.register',)->with('societies',$societies);
        }
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
        $status = $this->societyInterface->addSociety($request);
        if($status)
            return redirect()->route('login.society')->with('success','Society registration done');
    }

    public function create_member(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users|email',
            'password' => 'required_with:password_confirmation|confirmed|min:8|max:16',
            'phoneno' => 'required',
            'age' => 'required|numeric|gt:18',
            'name_or_number' => 'required',
            'society_id' => 'required'
        ]);
        $status = $this->memberInterface->addMember($request);
        if($status)
            return redirect()->route('login.member')->with('success','Member registration done');
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
