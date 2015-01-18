<?php namespace iakio\dbstart\Commands;

class InitCommand extends BaseCommand {

    protected $name = "dbstart:init";

    public function fire()
    {
        $pgdata = storage_path() . DIRECTORY_SEPARATOR . "data";
        $command = ["initdb", "-D", $pgdata];

        $this->runProcess($command);
    }
}
