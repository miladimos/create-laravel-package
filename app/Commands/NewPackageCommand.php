<?php

namespace App\Commands;

use Illuminate\Support\Facades\Http;
use Illuminate\Console\Scheduling\Schedule;
use LaravelZero\Framework\Commands\Command;

class NewPackageCommand extends Command
{
    /**
     * The signature of the command.
     *
     * @var string
     */
    protected $signature = 'new {packageName}';

    /**
     * The description of the command.
     *
     * @var string
     */
    protected $description = 'Create a new Laravel Package';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->notify('Hello Web Artisan', 'Love beautiful code? We do too!');
        $templateRepoZipFileUrl = "https://github.com/miladimos/package-skeleton/archive/master.zip";

        $this->downloadTemplateZipFile($templateRepoZipFileUrl);
        //        $this->info("Test");
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

    public function downloadTemplateZipFile($url)
    {
        $result = Http::get($url);
        return $result;
    }
    
}
