<?php namespace iakio\dbstart\Commands;

use Illuminate\Console\Command;

class DbStartCommand extends Command {

    protected $name = "dbstart";

    public function fire()
    {
        $subcommands = [
            "dbstart:init",
            "dbstart:start",
            //"dbstart:createuser",
            "dbstart:createdb", 
        ];

        foreach ($subcommands as $command) {
            try {
                $this->call($command);
            } catch (\Exception $e) {
            }
        }
    }
}
