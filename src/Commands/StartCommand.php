<?php namespace iakio\dbstart\Commands;

class StartCommand extends BaseCommand {

    protected $name = "dbstart:start";

    public function fire()
    {
        $pgdata = storage_path() . DIRECTORY_SEPARATOR . "data";
        $command = ["pg_ctl", "start", "-w", "-D", $pgdata];

        $this->runProcess($command);
    }
}
