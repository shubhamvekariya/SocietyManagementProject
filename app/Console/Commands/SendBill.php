<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use App\Models\Society;
use App\Models\User;
use App\Models\Bill;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use PDF;
use Exception;

class SendBill extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'send:bill';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send bills to members';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        try {

            $societies = Society::all();
            foreach ($societies as $society) {
                $users = User::select('users.*')->join('apartments', 'users.id', '=', 'apartments.user_id')->where('apartments.society_id', $society->id)->get();
                $count = count($users);

                $day = date('d');
                $month = date('m');
                $year = date('Y');
                $sum = DB::table('expenses')
                    ->whereYear('created_at', $year)
                    ->whereMonth('created_at', $month)
                    ->sum('money');

                $total_expense = $sum / $count;

                $due_date = ((int)$day + 5) . "/" . $month . "/" . $year;
                $bill = Bill::create([
                    'day' => $day,
                    'month' =>  $month,
                    'year' =>  $year,
                    'sum' =>  $total_expense,
                    'count' =>  $count,
                    'due_date' =>  $due_date,
                    'society_id' =>  $society->id,
                ]);

                $societies = $society;

                foreach ($users as $user) {
                    $bills = Bill::where('society_id', $society->id)->get();

                    $data["email"] = "yagnesh.p@simformsolutions.com"; // $user->email
                    $data["client_name"] = "ISocietyClub"; // $user->name
                    $data["subject"] = "Mail from ISocietyClub";

                    $pdf = PDF::loadView('bill.index', $data, compact('societies', 'bills', 'user'));


                    Mail::send('emails.billPDF', $data, function ($message) use ($data, $pdf) {
                        $message->to($data["email"], $data["client_name"])->from('isocietyclub@gmail.com')
                            ->subject($data["subject"])
                            ->attachData($pdf->output(), "bill.pdf");
                    });
                }
            }

            Log::info('Bill sent succussfully');
        } catch (Exception $e) {
            Log::info($e);
        }
    }
}
