<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Support\Facades\DB;
use App\Models\Task;
use App\Models\UserTasks;
use App\Jobs\SendTaskMail;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        //
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */

    protected function scheduleTimezone()
    {
        return 'America/El_Salvador';
    }

    protected function schedule(Schedule $schedule)
    {
        
        $user = UserTasks::all();
        $userweek = UserTasks::all();
        $task = Task::all();

        foreach($user as $user)
        {
        $schedule->command('sendmail:day '.$user->id)
                 ->daily();
        }
        foreach($userweek as $userweek)
        {
        $schedule->command('sendmail:weekly '.$userweek->id)
                 ->weekly();
        }
        foreach($task as $task)
        {
        $taskcron = $task->end;
        $date = str_split($taskcron);
        $taskcrontime = $task->time;
        $time = str_split($taskcrontime);
        $schedule->command('sendmail:task '.$task->id)
                 ->cron($time[3].$time[4].' '.$time[0].$time[1].' '.$date[8].$date[9].' '.$date[5].$date[6].' *' );
        }

        // dispatch(new SendTaskMail());
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
