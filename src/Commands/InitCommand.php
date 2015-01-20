<?php namespace iakio\dbstart\Commands;

class InitCommand extends BaseCommand {

    protected $name = "dbstart:init";

    public function fire()
    {
        $pgdata = $this->config->get("dbstart.path");
        $command = ["initdb", "-D", $pgdata];

        $this->process->run($command, $this->output);
    }
}
