<?php namespace iakio\dbstart\Commands;

class StartCommand extends BaseCommand {

    protected $name = "dbstart:start";

    public function fire()
    {
        $pgdata = $this->config->get("dbstart.path");
        $command = ["pg_ctl", "start", "-w", "-D", $pgdata];

        $this->process->run($command, $this->output);
    }
}
