<?php

namespace App\Commands;

use Illuminate\Console\Scheduling\Schedule;
use LaravelZero\Framework\Commands\Command;

class VersionCommand extends Command
{
    /**
     * The signature of the command.
     *
     * @var string
     */
    protected $signature = 'version';

    /**
     * The description of the command.
     *
     * @var string
     */
    protected $description = 'Current Version';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $phpVersion = shell_exec("php -v");
        $this->info("Current Installed PHP Version: \n" . $phpVersion);
    }

    /**
     * Define the command's schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule $schedule
     * @return void
     */
    public function schedule(Schedule $schedule): void
    {
        // $schedule->command(static::class)->everyMinute();
    }
}
