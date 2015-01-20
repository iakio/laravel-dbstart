<?php namespace iakio\dbstart\Services;

use Symfony\Component\Console\Output\ConsoleOutput;
use Symfony\Component\Process\ProcessBuilder;
use Symfony\Component\Console\Output\OutputInterface;

class ProcessService {

    public function run(array $command, OutputInterface $output = null)
    {
        if ($output === null) {
            $output = new ConsoleOutput();
        }
        $process = ProcessBuilder::create($command);
        $process->getProcess()->mustRun(function ($type, $buffer) use ($output) {
            if ($type === "err") {
                $output->writeln("<error>$buffer</error>");
            } else {
                $output->writeln($buffer);
            }
        });
    }
}
