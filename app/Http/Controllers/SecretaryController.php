<?php

namespace App\Http\Controllers;

use App\Interfaces\ApproveInterface;
use App\Interfaces\RuleInterface;
use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Models\Rule;
use Illuminate\Support\Facades\Auth;

class SecretaryController extends Controller
{
    protected $approveInterface;
    protected $ruleInterface;
    public function __construct(ApproveInterface $approveInterface,RuleInterface $ruleInterface)
    {
        $this->approveInterface = $approveInterface;
        $this->ruleInterface = $ruleInterface;

    }
    public function approve($user_id)
    {
        $status = $this->approveInterface->approve($user_id);
        if($status)
            return redirect()->back()->with('approvesuccess','User approved successfully');
        else
            return redirect()->back()->with('approveerror','Something went wrong');
    }

    public function reject($user_id)
    {
        $status = $this->approveInterface->reject($user_id);
        if($status)
            return redirect()->back()->with('approvesuccess','User rejected');
        else
            return redirect()->back()->with('approveerror','Something went wrong');
        return redirect()->back()->with('approvesuccess','User rejected');
    }

    public function disapprovemembers(Request $request)
    {
        if ($request->ajax()) {
            return $this->approveInterface->disapprovemembers();
        }

        return view('society.approvemembers');
    }

   public function add_rule(Request $request)
    {

        $status = $this->ruleInterface->addRule($request);
        if($status)
        {
            return redirect()->route('society.all_rule')->with('success','Rule added successfully');
        }
        else
        {
            return redirect()->back()->with('error','Something went wrong');
        }

    }

    public function show_rule(Request $request)
    {
        if ($request->ajax()) {
            return $this->ruleInterface->showRule($request);
        }
        return view('society.all_rule');

    }

    public function delete_rule($id)
    {

        $status = $this->ruleInterface->deleteRule($id);
        if($status)
        {
            return redirect()->back()->with('success','Rule Deleted successfully');
        }
        else
        {
            return redirect()->back()->with('error','Something went wrong');
        }

    }

    public function edit_rule($id)
    {

        $rules = $this->ruleInterface->editRule($id);
        if(!$rules)
        {
            return redirect()->back()->with('error','Something went wrong');
        }

        return view('society.edit_rule',compact('rules'));
    }

    public function update_rule(Request $request)
    {
        $status = $this->ruleInterface->updateRule($request);
        if($status)
        {
            return redirect()->route('society.all_rule')->with('success','Rule edited successfully');
        }
        else
        {
            return redirect()->back()->with('error','Something went wrong');
        }

     }
}
