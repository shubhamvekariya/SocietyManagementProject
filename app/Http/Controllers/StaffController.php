<?php

namespace App\Http\Controllers;

use App\Http\Requests\StaffRequest;
use App\Interfaces\StaffInterface;
use App\Models\Attendance;
use App\Models\Salary;
use App\Models\Staff;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PhpParser\Node\Expr\Cast\Object_;

use Stripe\Charge;
use Stripe\Stripe;
use Stripe\Customer;
use Session;


class StaffController extends Controller
{
    protected $staffInterface;
    public function __construct(StaffInterface $staffInterface)
    {
        $this->staffInterface = $staffInterface;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        if ($request->ajax()) {
            return $this->staffInterface->allStaffs();
        }
        return view('cmember.staffs');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('cmember.addstaff');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StaffRequest $request)
    {
        //
        $request->validated();
        $password = Str::random(8);
        $status = $this->staffInterface->addStaff($request, $password);
        if ($status)
            $work = $request->work ? '(' . $request->work . ')' : '';
        $details = [
            'title' => 'Mail from ISocietyClub.com',
            'position' => $request->position . $work,
            'password' => $password
        ];
        Mail::to('shubham.v@simformsolutions.com')->send(new \App\Mail\StaffPasswordMail($details)); //$request->email for emaill
        return redirect()->route('member.staffs.index')->with('success', $request->position . $work . ' added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Staff $staff
     * @return \Illuminate\Http\Response
     */
    public function show(Staff $staff)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Staff $staff
     * @return \Illuminate\Http\Response
     */
    public function edit(Staff $staff)
    {
        //
        return view('cmember.editstaff', compact('staff'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Staff $staff
     * @return \Illuminate\Http\Response
     */
    public function update(StaffRequest $request, Staff $staff)
    {
        //
        $request->validated();
        $status = $this->staffInterface->editStaff($request, $staff);
        $work = $request->work ? '(' . $request->work . ')' : '';
        if ($status)
            return redirect()->route('member.staffs.index')->with('success', $request->position . $work . ' edited successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Staff $staff
     * @return \Illuminate\Http\Response
     */
    public function destroy(Staff $staff)
    {
        //
        $status = $this->staffInterface->deleteStaff($staff);
        if ($status)
            return redirect()->route('member.staffs.index')->with('success', 'staff deleteted successfully');
        else
            return redirect()->route('member.staffs.index')->with('error', 'something went wrong');
    }

    public function getPassword()
    {
        //
        return view('cmember.setpassword');
    }

    public function setPassword(StaffRequest $request)
    {
        //
        $request->validated();
        $status = $this->staffInterface->setPassword($request);
        return redirect()->route('staff.home');
    }
    /**
     *
     * @param  \App\Models\visitor $visitor
     * @return \Illuminate\Http\Response
     */
    public function allStaffs(Request $request)
    {
        if ($request->ajax())
            return $this->staffInterface->allStaffs();
        return view('security.staffattendance');
    }

    public function checkinStaff($id)
    {
        Attendance::create([
            'staff_id' => $id,
            'entry_time' => now()
        ]);
        return redirect()->back()->with('success', 'Staff entry done');
    }

    public function checkoutStaff($id)
    {
        $attendance = Attendance::find($id);
        $attendance->update([
            'exit_time' => now()
        ]);
        return redirect()->back()->with('success', 'Staff exit done');
    }

    public function attendance(Request $request)
    {
        if ($request->ajax()) {
            return $this->staffInterface->staffAttendance(null);
        }
        return view('staff_security.attendance');
    }

    public function staffAttendance(Request $request, $id)
    {
        if ($request->ajax()) {
            return $this->staffInterface->staffAttendance($id);
        }
        return view('staff_security.attendance', compact('id'));
    }

    public function payStaffSalary(Request $request)
    {
        //dd($request->salary);
        $paystaff = Salary::create([
            'month' => $request->month,
            'year' => $request->year,
            'salary' => $request->salary,
            'staff_id' => $request->staff_id,
            'leave' => $request->leave
        ]);
        //dd($paystaff);

      $user_email = Auth::user()->email;
      $user_name = Auth::user()->name;

    Stripe::setApiKey(env('STRIPE_SECRET'));
        $customer = Customer::create(array(
            'email' =>  $user_email,
            'source'  => $request->stripeToken
        ));

        $charge = Charge::create(array(
            'customer' => $customer->id,
            'amount'   => $request->salary*1000,
            'currency' => 'inr',
            "description" => "Payment Done By ".$user_name,
            "metadata" => [
                "name" => Auth::user()->name,
                "email" => Auth::user()->email,
                "age" => Auth::user()->age,
                "phoneno" => Auth::user()->phoneno,
                "gender" => Auth::user()->gender
             ],
        ));
       // dd('hello');

        $details = [
                     'title' => 'Mail from ISocietyClub.com',
                     'success' => 'Salary Paid successfully By:'.$user_name,
                     'amount' => 'Amount:' .$request->salary*10,
                ];
                Mail::to('yagnesh.p@simformsolutions.com')
            ->send(new \App\Mail\BillMail($details));

        //Session::flash('success', 'Payment successful!');

       return redirect('/staffs')->with('success','Salary Paid');
    }

    public function showStaffSalary($id)
    {
        $salaries = $this->staffInterface->staffSalary($id);
       return view('staff_security.salary',compact('salaries'));

    }

    public function showSalary()
    {
        $salaries = $this->staffInterface->staffSalary(Auth::user()->id);
        return view('staff_security.salary',compact('salaries'));

    }

    public function salarypayment(Request $request)
    {
        //dd($request);
        return view('stripesalary')->with('request',$request);
    }
}
