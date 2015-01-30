<?php

namespace spec\iakio\dbstart\Commands;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Illuminate\Config\Repository;
use iakio\dbstart\Services\ProcessService;

class StopCommandSpec extends ObjectBehavior
{
    function let(Repository $repository, ProcessService $process)
    {
        $this->beConstructedWith($repository, $process);
        $this->shouldHaveType('iakio\dbstart\Commands\StopCommand');
    }

    function it_runs_start_db_command(Repository $repository, ProcessService $process)
    {
        $repository->get("dbstart.path")->willReturn("path_to_storage");
        $process->run(["pg_ctl", "stop", "-w", "-D", "path_to_storage"], Argument::any())->shouldBeCalled();
        $this->fire();
    }
}
