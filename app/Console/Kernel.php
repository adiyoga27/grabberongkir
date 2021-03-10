<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        \App\Console\Commands\ProvinceCommand::class,
        \App\Console\Commands\CityCommand::class,
    ];

    /**
     * 
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('province:fetch')
        //     ->timezone('Asia/Jakarta')
        //     ->everySixHours()
        //     ->description('Fetch province data from raja ongkir API.');

        //     $schedule->command('city:fetch')
        //     ->timezone('Asia/Jakarta')
        //     ->everySixHours()
        //     ->description('Fetch city data from raja ongkir API.');

        //     $schedule->command('subdistrict:fetch')
        //     ->timezone('Asia/Jakarta')
        //     ->everySixHours()
        //     ->description('Fetch subdistrict data from raja ongkir API.');
        
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
