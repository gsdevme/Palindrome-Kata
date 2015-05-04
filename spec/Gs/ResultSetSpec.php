<?php

namespace spec\Gs;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class ResultSetSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Gs\ResultSet');
        $this->shouldHaveType('Gs\SequenceSolver\ResultSetInterface');
    }
}
