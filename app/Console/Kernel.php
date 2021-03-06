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
    // Commands\Inspire::class,
  ];

  /**
   * Define the application's command schedule.
   *
   * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
   * @return void
   */
  protected function schedule(Schedule $schedule)
  {
    // $schedule->command('inspire')
    //      ->hourly();
      $schedule->exec('./vendor/bin/phpunit')
               ->dailyAt("06:25")
               ->after(function () {
                          env("TEST_SUCCESSFULL", "FALSE");
                          env("LAST_TEST_TIME", date("Y-m-d"));
                          config('tests.test_result', true);
               })
               ->withoutOverlapping();
      $schedule->exec('./vendor/bin/phpunit')
               ->daily()
               ->sendOutputTo("/output")
               ->emailOutputTo("smartacc@gmail.com")
               ->withoutOverlapping();
  }
}
