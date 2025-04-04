<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule)
    {
        // Run the command to clean up expired verification codes every minute
        $schedule->command('verification:cleanup')->everyMinute();
    }

    /**
     * Register the commands for the application.
     */
    protected function commands()   
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
