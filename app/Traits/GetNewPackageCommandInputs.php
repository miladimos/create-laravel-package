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
     * get Nedded Inputs for create new package.
     */
    public function getInputs()
    {
        $packageName = $this->getPackageNameInput();
        $vendor = $this->getVendorInput();
        $dir = $this->getDirectoryInput();
        $author = $this->getAuthorInput();
        $email = $this->getEmailInput();
        $copyright = $this->getCopyrightInput();
        $namespace = $this->getCopyrightInput();
        $vendorNamespace = $this->getCopyrightInput();

        $this->table(
            ['packageName', 'Vendor', 'Directory', 'Author', 'E-mail', 'Copyright'],
            [
                [$packageName, $vendor, $dir, $author, $email, $copyright],
            ]
        );
    }

    /**
     * Get the vendor name from the input.
     *
     * @return string
     */
    protected function getVendorInput()
    {

        $this->vendor = $this->argument('vendor');

        if (!$this->argument('vendor')) {
            $this->vendor = $this->ask('Package Name: ');
        }

        return $this->vendor;
    }

    /**
     * Get author name from the input.
     *
     * @return string
     */
    protected function getAuthorInput()
    {

        $this->author = $this->argument('author');

        if (!$this->argument('author')) {
            $this->author = $this->ask('Package Name: ');
        }

        return $this->author;
    }
}
