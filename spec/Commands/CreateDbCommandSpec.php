<?php

namespace spec\iakio\dbstart\Commands;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Illuminate\Config\Repository;
use iakio\dbstart\Services\ProcessService;

class CreateDbCommandSpec extends ObjectBehavior
{
    function let(Repository $repository, ProcessService $process)
    {
        $this->beConstructedWith($repository, $process);
        $this->shouldHaveType('iakio\dbstart\Commands\CreateDbCommand');
    }

    function it_runs_createdb_command_with_dbname(Repository $repository, ProcessService $process)
    {
        $repository->get("database.default")->willReturn("pgsql");
        $repository->get("database.connections.pgsql.username")->willReturn(null);
        $repository->get("database.connections.pgsql.database")->willReturn("dbname");
        $process->run(["createdb", "dbname"], Argument::any())->shouldBeCalled();
        $this->fire();
    }

    function it_runs_createdb_command_with_username(Repository $repository, ProcessService $process)
    {
        $repository->get("database.default")->willReturn("pgsql");
        $repository->get("database.connections.pgsql.username")->willReturn("username");
        $repository->get("database.connections.pgsql.database")->willReturn("dbname");
        $process->run(["createdb", "-O", "username", "dbname"], Argument::any())->shouldBeCalled();
        $this->fire();
    }
}
