<?php

namespace App\Http\Controllers;
use Session;
//use Stripe;

use App\Models\Society;
use App\Models\Bill;
use Stripe\Charge;
use Stripe\Stripe;
use Stripe\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class StripePaymentController extends Controller
{

    public function stripePost(Request $request)
    {
        //Society::find(Auth::user()->id);

        $bills = Bill::where('society_id', Auth::user()->id)->get();
        //dd($bills[0]->sum);
        //dd($societies);


    //     Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

    //     Stripe\Charge::create ([
    //             "amount" => 2000*100,
    //             "currency" => "inr",
    //             "source" => $request->stripeToken,
    //             "description" => "Test payment",
    //             "metadata" => ["bill_id" => "6735"]
    //     ]);
    //    // dd('Hello');

    //     //Session::flash('success', 'Payment successful!');
    //     echo "<script>alert('Payment successful');</script>";

    //    // return back();


      $user_email = Auth::user()->email;
      $user_name = Auth::user()->name;

    Stripe::setApiKey(env('STRIPE_SECRET'));
    //dd('Hello');

        $customer = Customer::create(array(
            'email' =>  $user_email,
            'source'  => $request->stripeToken
        ));
        //dd($customer);


        $charge = Charge::create(array(
            'customer' => $customer->id,
            'amount'   => ($bills[0]->sum),
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

        $details = [
                     'title' => 'Mail from ISocietyClub.com',
                     'success' => 'Bill Paid successfully By:'.$user_name,
                     'amount' => 'Amount:' .($bills[0]->sum),
                ];
                Mail::to('yagnesh.p@simformsolutions.com') //Auth::user()->apartment->society->email;
            ->send(new \App\Mail\BillMail($details));

        Session::flash('success', 'Payment successful!');
        return back();

    }
}
