<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
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
           $products = DB::table('product')->where('product_state', 'Release soon')->get();
            $newProducts =DB::table('time_activity_products')->where('product_name', $products->product_name)->get();
           if((Carbon::today()->toDateString()==$newProducts->date_activation_product)&&(Carbon::today()->toTimeString()==$newProducts->time_activation_product)){
               $products->product_state = "Active";
               $products->save();
            }
        })->everyMinute();
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
