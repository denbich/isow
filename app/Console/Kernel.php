<?php

namespace App\Console;

use App\Mail\VolunteerBirthday;
use App\Models\Volunteer;
use Illuminate\Support\Facades\Mail;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('inspire')->hourly();
        $schedule->call(function () {
            $volunteers = Volunteer::with('user')->get();
            foreach($volunteers as $volunteer)
            {
                if(date('m-d', strtotime($volunteer->birth)) == date('m-d'))
                {
                    $datam = array('firstname' => $volunteer->user->firstname);
                    Mail::to($volunteer->user->email)->send(new VolunteerBirthday($datam));
                }
            }
        })->daily()->at('12:00');

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

    protected function scheduleTimezone()
    {
        return 'Europe/warsaw';
    }
}
