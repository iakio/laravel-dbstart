<?php namespace iakio\dbstart\Commands;

use Illuminate\Config\Repository;
use Illuminate\Console\Command;
use Symfony\Component\Process\ProcessBuilder;

class BaseCommand extends Command {

    protected $config;

    public function __construct(Repository $config)
    {
        parent::__construct();
        $this->config = $config;
    }

    public function runProcess(array $command)
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
