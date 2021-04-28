<?php

namespace App\Http\Controllers;

use Session;
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

        $bills = Bill::where('society_id', Auth::user()->id)->get();



        $user_email = Auth::user()->email;
        $user_name = Auth::user()->name;

        Stripe::setApiKey(env('STRIPE_SECRET'));

        $customer = Customer::create(array(
            'email' =>  $user_email,
            'source'  => $request->stripeToken
        ));
        $bills[0]->sum += ($bills[0]->sum) * 0.05;


        $charge = Charge::create(array(
            'customer' => $customer->id,
            'amount'   => ($bills[0]->sum),
            'currency' => 'inr',
            "description" => "Payment Done By " . $user_name,
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
            'success' => 'Bill Paid successfully By:' . $user_name,
            'amount' => 'Amount:' . ($bills[0]->sum),
        ];
        Mail::to('yagnesh.p@simformsolutions.com') //Auth::user()->apartment->society->email;
            ->send(new \App\Mail\BillMail($details));

        Session::flash('success', 'Payment successful!');
        return back();
    }
}
