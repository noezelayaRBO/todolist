<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Daily;
use App\Models\Weekly;
use App\Models\UserTasks;

class DailyMail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sendmail:day {user}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send a Daily email to a user';

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
        // return 0;
        $usermail = UserTasks::where('id', $this->argument('user'))->firstOrFail();
        $daily = Daily::where('user', $this->argument('user'))->get();
        \Mail::to($usermail->email)->send(new \App\Mail\SendDailyMail($daily));
    }
}
