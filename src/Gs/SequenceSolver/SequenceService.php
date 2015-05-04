<?php

namespace Gs\SequenceSolver;

class SequenceService
{
    private $solver;
    private $result;

    public function __construct(SequenceSolverInterface $solver, ResultSetInterface $result)
    {
        $this->solver = $solver;
        $this->result = $result;
    }

    public function solve(array $cases, $limit = null)
    {
        $result = clone $this->result;

        if ($limit === null) {
            $limit = count($cases);
        }

        for ($i = 0; $i < $limit; ++$i) {
            $result->add($cases[$i], $this->solver->solve($cases[$i]));
        }

        return $result;
    }
}
