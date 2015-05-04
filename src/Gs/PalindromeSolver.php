<?php

namespace Gs;

use Gs\SequenceSolver\SequenceSolverInterface;

class PalindromeSolver implements SequenceSolverInterface
{

    /**
     * @inheritdoc
     */
    public function solve($case)
    {
        $case = strtolower($case);

        return $case === strrev($case);
    }
}
