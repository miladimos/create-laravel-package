<?php

namespace App\Commands;

use Illuminate\Console\Scheduling\Schedule;
use LaravelZero\Framework\Commands\Command;

class VersionCommand extends Command
{

    protected $signature = 'version';

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
        $this->newLine();
        $this->info("Current Installed Package Version: \n" . config('app.version'));
    }

    public function schedule(Schedule $schedule): void
    {
        // $schedule->command(static::class)->everyMinute();
    }
}
