<?php

namespace spec\iakio\dbstart\Commands;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class DbStartCommandSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('iakio\dbstart\Commands\DbStartCommand');
    }
}
