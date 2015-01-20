<?php namespace iakio\dbstart\Commands;

use Illuminate\Config\Repository;
use Illuminate\Console\Command;
use Symfony\Component\Process\ProcessBuilder;
use iakio\dbstart\Services\ProcessService;

class BaseCommand extends Command {

    protected $config;
    protected $process;

    public function __construct(Repository $config, ProcessService $process)
    {
        parent::__construct();
        $this->config = $config;
        $this->process = $process;
    }
}
