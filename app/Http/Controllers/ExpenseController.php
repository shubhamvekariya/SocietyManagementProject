<?php

namespace App\Http\Controllers;


use App\Models\Expense;
use App\Interfaces\ExpenseInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ExpenseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    protected $expenseInterface;

    public function __construct(ExpenseInterface $expenseInterface)
    {

        $this->expenseInterface = $expenseInterface;
    }
    public function index(Request $request)
    {
        if ($request->ajax()) {
            return $this->expenseInterface->showExpense($request);
        }
        return view('expense.allexpense');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('expense.addexpense');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $status = $this->expenseInterface->addExpense($request);
        if($status)
        {
        return redirect()->route('member.expenses.index')->with('success','Expense Added successfully');
        //echo "<script>alert('done');</script>";

        }
        else
        {
            return redirect()->back()->with('error','Something went wrong');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Expense $expense)
    {
        //dd($expense);
        return view('expense.editexpense', compact('expense'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Expense $expense)
    {
        $status = $this->expenseInterface->updateExpense($request, $expense);
        if ($status) {
            return redirect()->route('member.expenses.index')->with('success', 'Expense Edited successfully');
        } else {
            return redirect()->back()->with('error', 'Something went wrong');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Expense $expense)
    {
        $status = $this->expenseInterface->deleteExpense($expense);
        if($status)
        {
        return redirect()->back()->with('success','Expense Deleted successfully');
        }
        else
        {
            return redirect()->back()->with('error','Something went wrong');
        }
    }

}
