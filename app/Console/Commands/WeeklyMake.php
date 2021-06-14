<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\UserTasks;
use App\Models\Weekly;

class WeeklyMake extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sendmail:weekly {user}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send a weekly email to a user';

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
        $weekly = Weekly::where('user_id', $this->argument('user'))->get();
        \Mail::to($usermail->email)->send(new \App\Mail\SendWeeklyMail($weekly));
    }
}
