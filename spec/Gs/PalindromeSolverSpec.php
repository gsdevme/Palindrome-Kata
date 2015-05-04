<?php

namespace spec\Gs;

use Gs\PalindromeSolver;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class PalindromeSolverSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Gs\PalindromeSolver');
        $this->shouldHaveType('Gs\SequenceSolver\SequenceSolverInterface');
    }

    function it_can_solve_a_palindrome()
    {
        $this->solve('hannah')->shouldReturn(true);
    }

    function it_can_solve_even_with_case_issues()
    {
        $this->solve('hannAH')->shouldReturn(true);
    }

    function it_can_not_handle_the_meaning_of_life()
    {
        $this->solve(42)->shouldReturn(false);
    }

    function it_can_solve_a_single_digit()
    {
        $this->solve('a')->shouldReturn(true);
    }
}
