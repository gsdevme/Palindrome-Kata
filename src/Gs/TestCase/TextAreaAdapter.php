<?php

namespace Gs\TestCase;

use Gs\TestCaseAdapterInterface;

class TextAreaAdapter implements TestCaseAdapterInterface
{
    private $textarea;

    public function __construct($textarea)
    {
        $this->textarea = $textarea;
    }

    public function getTestCases()
    {
        $cases = explode(PHP_EOL, $this->textarea);
        $cases = array_map('trim', $cases);

        return array_slice($cases, 1);
    }

    public function getLimit()
    {
        $firstLineReturn = stripos($this->textarea, PHP_EOL);

        return (int)substr($this->textarea, 0, $firstLineReturn);
    }
}
