<?php

namespace Gs;

interface TestCaseAdapterInterface
{
    /**
     * @return array
     */
    public function getTestCases();

    /**
     * @return int|null
     */
    public function getLimit();
}
