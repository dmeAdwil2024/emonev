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
        //
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->call(function () {

            $sakti = new \App\Http\Controllers\SaktiController;
            $sakti->synchDataAnggaran();
            $sakti->synchDataRealisasi();
            $sakti->synchDataAnggaranEselon1();
            $sakti->synchDataRealisasiEselon1();

		})->everyMinute();
   
   $schedule->command('inspire')
            ->everyMinute()
             ->appendOutputTo(storage_path('logs/inspire.log'));
  
        $schedule->call(function () {

            $sakti = new \App\Http\Controllers\SaktiController;
            $sakti->checkSynchToday("realisasi");

		})->twiceDaily(4, 19);
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
