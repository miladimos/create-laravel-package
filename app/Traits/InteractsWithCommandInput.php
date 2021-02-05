<?php

namespace App\Traits;

use Symfony\Component\Console\Input\InputArgument;

trait InteractsWithCommandInput
{
    /**
     * Get the console command arguments.
     *
     * @return array
     */
    protected function getArgument($input, $required = false)
    {
        return [
            [$input, InputArgument::REQUIRED, 'The name of the class'],
        ];
    }
}
