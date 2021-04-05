<?php

namespace App\Http\Controllers;
//use Session;
//use Stripe;

use App\Models\Society;
use Stripe\Charge;
use Stripe\Stripe;
use Stripe\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StripePaymentController extends Controller
{

    public function stripePost(Request $request)
    {
        //dd('Hello');
       // dd($request->all());

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

    //dd($request->all());

      //$user_id = Auth::user()->id;
      $user_email = Auth::user()->email;
      $user_name = Auth::user()->name;
     // $society = Society::where('id',Auth::user()->id);
      //dd($society);
      //dd($user_email);

    Stripe::setApiKey(env('STRIPE_SECRET'));
    //dd('Hello');

        $customer = Customer::create(array(
            'email' =>  $user_email,
            'source'  => $request->stripeToken
        ));
        //dd($customer);


        $charge = Charge::create(array(
            'customer' => $customer->id,
            'amount'   => 1999*100,
            'currency' => 'inr',
            "description" => "Payment Done By".$user_name,
            "metadata" => [
                "name" => Auth::user()->name,
                "email" => Auth::user()->email,
                "age" => Auth::user()->age,
                "phoneno" => Auth::user()->phoneno,
                "gender" => Auth::user()->gender
             ],
        ));
        //dd($charge);
        echo "<script>alert('Payment successful');</script>";
    }
}
