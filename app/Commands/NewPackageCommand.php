<?php

namespace App\Commands;

use App\Services\PackageTemplateService;
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
    protected $signature = 'new
                            {name? : packageName}';

    /**
     * The description of the command.
     *
     * @var string
     */
    protected $description = 'Create a new laravel package template';

    /**
     * The name of the package.
     *
     * @var string
     */
    protected $name;

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle(PackageTemplateService $service)
    {
        $this->info("Creating new laravel package template ... ");

        $this->name = $service->name($this->argument('name'));

        if (!$this->argument('name')) {
            $this->name = $service->name($this->ask('Package Name: '));
        }

        $this->newLine();
        $this->info($this->name);
        $this->newLine();

        $url = "https://github.com/miladimos/package-skeleton/archive/master.zip";


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
}
