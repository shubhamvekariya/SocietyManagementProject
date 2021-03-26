<?php

namespace App\Repository;

use App\Interfaces\ExpenseInterface;
use App\Models\Expense;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;


class ExpenseRepository implements ExpenseInterface
{
    public function __construct()
    {
    }
    public function addExpense($request)
    {
        $expense = Expense::create([
            'title' =>  $request->title,
            'description' =>  $request->description,
            'date' =>  date('Y-m-d H:i:s', strtotime($request->date)),
            'money' => $request->money,
            'society_id' => Auth::user()->apartment->society_id,
        ]);

        if ($expense) {
            return true;
        } else {
            return false;
        }
    }
    public function showExpense($request)
    {

        $data = Expense::where('society_id', Auth::user()->apartment->society_id)->get();
        return DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('action', function ($row) {
                $btn = '<form action="' . route('member.expenses.destroy', [$row->id]) . '" method="POST">';
                $btn .= '<input type="hidden" name="_method" value="DELETE"><input type="hidden" name="_token" value="' . csrf_token() . '">';
                $btn .= '<a href="' . route('member.expenses.edit', [$row->id]) . '" class="edit btn btn-primary btn-rounded mx-4" style="width:78px;">Edit</a>';
                $btn .= '<button type="submit" class="edit btn btn-danger btn-rounded mx-3" style="width:78px;">Delete</button>';
                $btn .= '</form>';
                return $btn;
            })
            ->rawColumns(['action'])
            ->make(true);
    }
    public function deleteExpense($expense)
    {
        $e = $expense->delete();
        if ($e) {
            return true;
        } else {
            return false;
        }
    }

    public function updateExpense($request,$expense)
    {
        $e = $expense->update($request->except('date', 'society_id'));
        $expense->update(['date' => date('Y-m-d H:i:s', strtotime($request->date))]);

        if ($e) {
            return true;
        } else {
            return false;
        }

    }
}
