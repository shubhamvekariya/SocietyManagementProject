<?php

namespace App\Interfaces;

interface ExpenseInterface
{
    public function addExpense($request);
    public function showExpense($request);
    public function deleteExpense($expense);
    public function updateExpense($request,$expense);
}
