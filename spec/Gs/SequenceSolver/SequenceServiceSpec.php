<?php

namespace spec\Gs\SequenceSolver;

use Gs\SequenceSolver\ResultSetInterface;
use Gs\SequenceSolver\SequenceSolverInterface;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class SequenceServiceSpec extends ObjectBehavior
{
    function let(SequenceSolverInterface $solver, ResultSetInterface $result)
    {
        $this->beConstructedWith($solver, $result);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('Gs\SequenceSolver\SequenceService');
    }

    function it_loops_and_solves(SequenceSolverInterface $solver, ResultSetInterface $result)
    {
        $solver->solve(Argument::any())
            ->shouldBeCalled()
            ->shouldBeCalledTimes(2);

        $result->add(Argument::any(), Argument::any())
            ->shouldBeCalled()
            ->shouldBeCalledTimes(2);

        $this->solve(['aaa', 'hannah']);
    }

}
