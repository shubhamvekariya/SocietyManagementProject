<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;

class PDFController extends Controller
{
    public function generatePDF()
    {

        $data = ['title' => 'Welcome to ISociety Club'];

        $pdf = PDF::loadView('myPDF', $data);

        return $pdf->download('isocietyclub.pdf');

    }
    public function show_bill()
    {
        return view('bill.addbill');
    }
}
