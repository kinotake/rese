<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Reserve;
use Illuminate\Support\Facades\Mail;
use App\Mail\ReminderEmail;

class SendReminders extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sendreminders';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'リマインドメールの送信';

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
       $today = \Carbon\Carbon::today();

        $reserveDatas = Reserve::whereDate('date','=',$today)->get();

        foreach ($reserveDatas as $reserveData) {
            
            Mail::send(new ReminderEmail($reserveData));

        }
    }
}