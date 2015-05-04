<?php

namespace spec\Gs\TestCase;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class TextAreaAdapterSpec extends ObjectBehavior
{
    function let()
    {
        $data = <<<DATA
11
testddd
teggdd
gggff
DATA;

        $this->beConstructedWith($data);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('Gs\TestCase\TextAreaAdapter');
        $this->shouldHaveType('Gs\TestCaseAdapterInterface');
    }

    function it_can_read_the_limit()
    {
        $this->getLimit()->shouldReturn(11);
    }

    function it_can_read_the_test_case()
    {
        $this->getTestCases()->shouldReturn([
            'testddd',
            'teggdd',
            'gggff'
        ]);
    }
}
