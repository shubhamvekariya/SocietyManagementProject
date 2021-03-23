<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Vonage\Message\Shortcode\Alert;
use Illuminate\Support\Facades\DB;
use App\Models\Society;
use App\Models\User;
use App\Models\Bill;
use Illuminate\Support\Facades\Log;
use Vonage\Numbers\Number;

class DemoCron extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'demo:cron';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
        $societies = Society::all();
        $count=0;

        foreach($societies as $society)
        {
        $users = User::select('users.*')->join('apartments', 'users.id', '=', 'apartments.user_id')->where('apartments.society_id',$society->id)->get();
        $count = count($users);

        $day = date('d');
        $month = date('m');
        $year = date('Y');
        $sum = DB::table('expenses')
        ->whereYear('created_at', $year)
        ->whereMonth('created_at', $month)
        ->sum('money');

        $total_expense = $sum/$count;

        Log::info((string)$users."".$total_expense);


        $due_date = ((int)$day+5)."/".$month."/".$year;
        $bill = Bill::create([
            'month' =>  $month,
            'year' =>  $year,
            'sum' =>  $sum,
            'count' =>  $count,
            'due_date' =>  $due_date,
            'society_id' =>  $society->id,
        ]);

        }


        // $month = date('m');
        // $year = date('Y');

        // $sum = DB::table('expenses')
        // ->whereYear('created_at', $year)
        // ->whereMonth('created_at', $month)
        // ->sum('money');

        // \Log::info("Sum of Monthly is working fine!".$sum);

        $this->info('Demo:Cron Cummand Run successfully!');

    }
}

