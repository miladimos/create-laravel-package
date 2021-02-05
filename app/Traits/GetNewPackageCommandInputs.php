<?php

namespace App\Traits;

use App\Services\PackageTemplateService;

trait GetNewPackageCommandInputs
{

    protected $service;

    public function __construct(PackageTemplateService $service)
    {
        $this->service = $service;
    }

    /**
     * Get the desired class name from the input.
     *
     * @return string
     */
    protected function getNameInput()
    {
        if ($this->packageName) {
            return $this->packageName;
        }

        if (!$this->packageName = trim($this->argument('name'))) {
            $this->packageName = $this->ask('What\'s your packages name?');
        }

        return $this->packageName;

        $this->name = $service->name($this->argument('name'));
        if (!$this->argument('name')) {
            $this->name = $service->name($this->ask('Package Name: '));
        }
    }
}
