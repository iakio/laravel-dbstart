<?php namespace iakio\dbstart\Commands;

class CreateDbCommand extends BaseCommand {

    protected $name = "dbstart:createdb";

    public function fire()
    {
        $command = ["createdb"];

        $default = $this->config->get("database.default");
        $key = "database.connections.$default";
        if ($this->config->get("$key.username")) {
            $command[] = "-O";
            $command[] = $this->config->get("$key.username");
        }
        $command[] = $this->config->get("$key.database");
        $this->process->run($command, $this->output);
    }
}
