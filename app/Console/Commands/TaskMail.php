<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Task;
use App\Models\UserTasks;

class TaskMail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sendmail:task {id}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send a Task email to a user';

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
        $task = Task::where('id', $this->argument('id'))->firstOrFail();
        $usermail = UserTasks::where('name', $task->user_id)->firstOrFail();
        
        \Mail::to($usermail->email)->send(new \App\Mail\SendTaskMail($task));
    }
}
