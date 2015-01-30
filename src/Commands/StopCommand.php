<?php namespace iakio\dbstart\Commands;

class StopCommand extends BaseCommand {

    protected $name = "dbstart:stop";

    public function fire()
    {
        $pgdata = $this->config->get("dbstart.path");
        $command = ["pg_ctl", "stop", "-w", "-D", $pgdata];

        $this->process->run($command, $this->output);
    }
}
