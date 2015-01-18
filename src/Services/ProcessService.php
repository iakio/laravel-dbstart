<?php namespace iakio\dbstart\Commands;

use Symfony\Component\Process\ProcessBuilder;

class ProcessService {

    public function run(array $command)
    {
        $process = ProcessBuilder::create($command);
        $process->getProcess()->mustRun(function ($type, $buffer) {
            if ($type === "err") {
                $this->error($buffer);
            } else {
                $this->info($buffer);
            }
        });
    }
}
