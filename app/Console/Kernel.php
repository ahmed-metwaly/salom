<?php

namespace App\Console;

use App\User;
use App\Promotion;
use Carbon\Carbon;
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

        '\App\Console\Commands\SuspendOrder',
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

            $users = User::where('user_type', 2)->where('admin_is_conf',1)->get();
            
            foreach($users as $user) {
                if (Carbon::now()->diffInDays($user->active_at) > $user->duration * 30) { 
                    $user->update([

                        'admin_is_conf' => 0,
                        'duration'      => 0,
                        'active_at'     => null

                    ]);
                   
                }
            }

            $promotions = Promotion::where('is_active', true)->where('end_at', Carbon::now())->get();

            foreach($promotions as $promotion) {
                if ($promotion->end_at < Carbon::now()) { 
                    $promotion->update([

                        'is_active' => false

                    ]);
                   
                }
            }
        })->daily();
        
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
