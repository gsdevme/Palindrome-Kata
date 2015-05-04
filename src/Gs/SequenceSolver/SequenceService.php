<?php

namespace Gs\SequenceSolver;

class SequenceService
{
    private $solver;
    private $result;

    /**
     * @param SequenceSolverInterface $solver
     * @param ResultSetInterface $result
     */
    public function __construct(SequenceSolverInterface $solver, ResultSetInterface $result)
    {
        $this->solver = $solver;
        $this->result = $result;
    }

    /**
     * @param array $cases
     * @param null $limit
     * @return ResultSetInterface
     */
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
