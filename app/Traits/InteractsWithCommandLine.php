<?php

namespace App\Traits;

use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;

trait InteractsWithCommandLine
{
    /**
     * Run the given command as a process.
     *
     * @param string $command
     * @param string $path
     */
    protected function runConsoleCommand($command, $path)
    {
        $process = Process::fromShellCommandline($command, $path)->setTimeout(null);
        $process->setTty($process->isTtySupported());

        $process->run(function ($type, $line) {
            $this->command->output->write($line);
        });
    }

    protected function runCommand($command)
    {
        $process = new Process($command);

        try {
            $process->mustRun();

            return $process->getOutput();
        } catch (ProcessFailedException $exception) {
            return $exception->getMessage();
        }
    }
}
