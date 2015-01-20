<?php

namespace spec\iakio\dbstart\Commands;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Illuminate\Config\Repository;
use iakio\dbstart\Services\ProcessService;


class InitCommandSpec extends ObjectBehavior
{
    function let(Repository $repository, ProcessService $process)
    {
        $this->beConstructedWith($repository, $process);
        $this->shouldHaveType('iakio\dbstart\Commands\InitCommand');
    }

    function it_runs_init_db_command(Repository $repository, ProcessService $process)
    {
        $repository->get("dbstart.path")->willReturn("path_to_storage");
        $process->run(["initdb", "-D", "path_to_storage"], Argument::any())->shouldBeCalled();
        $this->fire();
    }
}
