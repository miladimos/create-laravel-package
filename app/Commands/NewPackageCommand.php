<?php

namespace App\Commands;

use ZipArchive;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use Illuminate\Console\Scheduling\Schedule;
use LaravelZero\Framework\Commands\Command;


class NewPackageCommand extends Command
{
    /**
     * The signature of the command.
     *
     * @var string
     */
    protected $signature = 'new {name: packageName}';

    /**
     * The description of the command.
     *
     * @var string
     */
    protected $description = 'Create a new laravel package template';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->info("new Package");

        $url = "https://github.com/miladimos/package-skeleton/archive/master.zip";

        $this->downloadTemplate($url);

        $this->task("Installing Laravel", function () {
            return false;
        });
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


    public function downloadTemplate(string $url)
    {

        $result = Http::get($url);

        Storage::put("template.zip", $result);
    }

    public function extractTemplate($templatePath)
    {
        $zip = new ZipArchive;
        if ($zip->open($templatePath) === true) {
            $zip->extractTo('/my/destination/dir/');
            $zip->close();
            return true;
        } else {
            return false;
        }
    }
}
