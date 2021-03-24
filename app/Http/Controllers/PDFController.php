<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
//use Mail;
use App\Models\Society;
use App\Models\Bill;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class PDFController extends Controller
{
    public function download_pdf()
    {

        // $data = ['title' => 'Welcome to ISociety Club'];
        $societies = Society::find(Auth::user()->id);
        $bills = Bill::where('society_id', Auth::user()->id)->get();

        $pdf = PDF::loadView('bill.index', compact('societies', 'bills'));

        return $pdf->download('bill.pdf');
    }
    public function show_bill()
    {
        $societies = Society::find(Auth::user()->id);
        $bills = Bill::where('society_id', Auth::user()->id)->get();
        //dd($bills);
        //dd($societies->all());
        return view('bill.addbill', compact('societies', 'bills'));
    }
    public function view_pdf()
    {
        $societies = Society::find(Auth::user()->id);
        $bills = Bill::where('society_id', Auth::user()->id)->get();

        $pdf = PDF::loadView('bill.index', compact('societies', 'bills'));
        return $pdf->stream('invoice.pdf');
    }
        public function sendemail_pdf(Request $request){
            $societies = Society::find( Auth::user()->id);
            $bills = Bill::where('society_id',Auth::user()->id)->get();

            $data["email"]="shubham.v@simformsolutions.com";
            $data["client_name"]="Yagnesh";
            $data["subject"]="Mail from Yp";

            $pdf = PDF::loadView('bill.index',$data,compact('societies','bills'));


                Mail::send('myPDF', $data, function($message)use($data,$pdf) {
                $message->to($data["email"], $data["client_name"])
                ->subject($data["subject"])
                ->attachData($pdf->output(), "bill.pdf");
                });

            return true;
     }
    // public function sendemail_pdf(Request $request)
    // {
    //     $societies = Society::find(Auth::user()->id);
    //     $bills = Bill::where('society_id', Auth::user()->id)->get();

    //     $pdf = PDF::loadView('bill.index', compact('societies', 'bills'));

    //     $details = [
    //         'title' => 'Mail from ISocietyClub.com',
    //     ];
    //     dd($pdf->output());
    //     Mail::to('shubham.v@simformsolutions.com')->send(new \App\Mail\BillMail($details))->attachData($pdf->output(), "bill.pdf"); //$request->email for emaill
    // }
}
