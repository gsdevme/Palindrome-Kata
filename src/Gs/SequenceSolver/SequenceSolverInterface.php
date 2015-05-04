<?php

namespace Gs\SequenceSolver;

interface SequenceSolverInterface
{

    /**
     * @param string $case
     * @return bool
     */
    public function solve($case);
}
