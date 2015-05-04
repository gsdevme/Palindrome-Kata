<?php

namespace spec\Gs\TestCase;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class FileAdapterSpec extends ObjectBehavior
{

    private function getTestFileObject()
    {
        $data =  <<<DATA
32
test
tegg
ggg
DATA;

        $file = new \SplTempFileObject();
        $file->fwrite($data);

        return $file;
    }

    function let(\SplTempFileObject $file)
    {
        $this->beConstructedWith($file);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('Gs\TestCase\FileAdapter');
        $this->shouldHaveType('Gs\TestCaseAdapterInterface');
    }

    function it_can_read_the_limit()
    {
        $this->beConstructedWith($this->getTestFileObject());

        $this->getLimit()->shouldReturn(32);
    }

    function it_can_read_the_test_case()
    {
        $this->beConstructedWith($this->getTestFileObject());

        $this->getTestCases()->shouldReturn([
            'test',
            'tegg',
            'ggg'
        ]);
    }
}
