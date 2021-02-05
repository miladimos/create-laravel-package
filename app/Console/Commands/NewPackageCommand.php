<?php

namespace App\Console\Commands;

use Illuminate\Filesystem\Filesystem;
use App\Services\PackageTemplateService;
use Illuminate\Console\Scheduling\Schedule;
use LaravelZero\Framework\Commands\Command;


class NewPackageCommand extends Command
{

    protected $signature = 'new
                            {packageName? : packageName}
                            {vendor? : vendor}
                            {email? : authroEmail}
                            {author? : author}
                            {namespace? : packageNamespace}
                            {vendorNamespace? : vendorNamespace}';

    protected $description = 'Create a new laravel package template';

    /**
     * The name of the package.
     *
     * @var string
     */
    protected $packageName;

    /**
     * The author of the package.
     *
     * @var string
     */
    protected $author;

    /**
     * The namespace of the package.
     *
     * @var string
     */
    protected $namespace;

    /**
     * The vendorNamespace of the package.
     *
     * @var string
     */
    protected $vendorNamespace;

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
     * The instanse of Filesystem.
     *
     * @var string
     */
    protected $fileSystem;


    public function __construct(Filesystem $fileSystem)
    {
        parent::__construct();

        $this->fileSystem = $fileSystem;
    }


    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle(PackageTemplateService $service)
    {
        $this->info("Creating new laravel package template ... ");



        $this->packageName = $service->name($this->argument('packageName'));
        if (!$this->argument('packageName')) {
            $this->packageName = $service->name($this->ask('Package Name: '));
        }

        $this->vendor = $service->name($this->argument('vendor'));
        if (!$this->argument('vendor')) {
            $this->vendor = $service->name($this->ask('Vendor Name: '));
        }

        $this->author = $service->name($this->argument('author'));
        if (!$this->argument('author')) {
            $this->author = $service->name($this->ask('Package author: '));
        }

        $this->namespace = $service->name($this->argument('namespace'));
        if (!$this->argument('name')) {
            $this->namespace = $service->name($this->ask('Package namespace: '));
        }

        $this->vendorNamespace = $service->name($this->argument('vendorNamespace'));
        if (!$this->argument('vendorNamespace')) {
            $this->vendorNamespace = $service->name($this->ask('Package vendorNamespace: '));
        }

        $this->notify("test", "ok");


        $this->newLine();
        $this->info($this->name);
        $this->info($this->vendor);
        $this->newLine();

        $this->task("Installing Laravel", function () {
            return false;
        });
    }

    public function schedule(Schedule $schedule): void
    {
        // $schedule->command(static::class)->everyMinute();
    }
}
