<?php

namespace App\Commands;

use App\Services\PackageTemplateService;
use Illuminate\Console\Scheduling\Schedule;
use LaravelZero\Framework\Commands\Command;


class NewPackageCommand extends Command
{

    protected $signature = 'new
                            {vendor? : vendorName}
                            {name? : packageName}';

    protected $description = 'Create a new laravel package template';

    /**
     * The name of the package.
     *
     * @var string
     */
    protected $name;

    /**
     * The vendor of the package.
     *
     * @var string
     */
    protected $vendor;

    /**
     * The email of the author of package.
     *
     * @var string
     */
    protected $email;

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle(PackageTemplateService $service)
    {
        $this->info("Creating new laravel package template ... ");


        $this->vendor = $service->name($this->argument('vendor'));

        if (!$this->argument('vendor')) {
            $this->vendor = $service->name($this->ask('Vendor Name: '));
        }

        $this->name = $service->name($this->argument('name'));

        if (!$this->argument('name')) {
            $this->name = $service->name($this->ask('Package Name: '));
        }

        $this->notify("test", "ok");


        $this->newLine();
        $this->info($this->name);
        $this->info($this->vendor);
        $this->newLine();

        $url = "https://github.com/miladimos/package-skeleton/archive/master.zip";


        $this->task("Installing Laravel", function () {
            return false;
        });
    }

    public function schedule(Schedule $schedule): void
    {
        // $schedule->command(static::class)->everyMinute();
    }
}
