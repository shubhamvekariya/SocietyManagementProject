<?php

namespace App\Http\Controllers\Auth;

use App\Models\Society;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\AuthRequest;
use App\Interfaces\MemberInterface;
use App\Interfaces\SocietyInterface;
use App\Interfaces\StaffInterface;
use App\Models\Apartment;
use App\Models\Staff;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


class LoginController extends Controller
{
    protected $memberInterface;
    protected $societyInterface;
    protected $staffInterface;
    //
    public function __construct(Request $request, MemberInterface $memberInterface, SocietyInterface $societyInterface, StaffInterface $staffInterface)
    {
        if ($request->segment(2) == 'society') {
            $this->societyInterface = $societyInterface;
            $this->middleware('guest:society')->except('destroy','edit_member','update_member');
        } elseif ($request->segment(2) == 'member') {
            $this->memberInterface = $memberInterface;
            $this->middleware('guest')->except('destroy','edit_member','update_member');
        } elseif ($request->segment(2) == 'staff') {
            $this->staffInterface = $staffInterface;
            $this->middleware('guest:staff_security')->except('destroy','edit_member','update_member');
        }
    }

    public function show_login()
    {
        return view('auth.login');
    }

    public function check_login(AuthRequest $request)
    {
        $request->validated();
        if ($request->segment(2) == 'society') {
            $login = $this->societyInterface->checkLogin($request->email, $request->password, $request->rememberme);
            if ($login) {
                $request->session()->regenerate();
                return redirect()->route('society.home');
            }
        }
        if ($request->segment(2) == 'member') {
            $login = $this->memberInterface->checkLogin($request->email, $request->password, $request->rememberme);
            if ($login) {
                $request->session()->regenerate();
                return redirect()->route('member.home');
            }
        }
        if ($request->segment(2) == 'staff') {
            $staff = Staff::where('email', $request->email)->first();
            $login = $this->staffInterface->checkLogin($request->email, $request->password, $request->rememberme);
            if ($login) {
                $request->session()->regenerate();
                $staff = Staff::where('email', $request->email)->first();
                if ($staff->hasPermissionTo('set password', 'staff_security'))
                    return redirect()->route('staff.setpassword');
                else
                    return redirect()->route('staff.home');
            }
        }
        return redirect()->back()->with('danger', 'Invalid credentials');
    }

    public function show_register(Request $request)
    {
        if ($request->segment(2) == 'member') {
            $societies = Society::all();
            return view('auth.register',)->with('societies', $societies);
        }
        return view('auth.register');
    }

    public function create_society(AuthRequest $request)
    {
        $request->validated();
        $status = $this->societyInterface->addSociety($request);
        if ($status)
            return redirect()->route('login.society')->with('success', 'Society registration done');
    }

    public function create_member(AuthRequest $request)
    {
        $request->validated();
        $status = $this->memberInterface->addMember($request);
        if ($status)
            return redirect()->route('login.member')->with('success', 'Member registration done');
    }

    public function destroy(Request $request)
    {
        if (Auth::guard('society')->check())
            $url = 'login.society';
        elseif (Auth::guard('staff_security')->check())
            $url = 'login.staff';
        else
            $url = 'login.member';
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route($url);
    }

    public function edit_member()
    {
        $user = Auth::user();
        return view('auth.editprofile',compact('user'));
    }

    public function update_member(Request $request)
    {


        $user = User::find(Auth::user()->id);
        $user->update($request->all());

        $apart = Apartment::find(Auth::user()->apartment->id);
        $apart->update($request->all());
       // dd($apart);
        echo "<script>alert('Updated');</script>";

    }
}
