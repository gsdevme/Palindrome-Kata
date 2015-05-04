<?php

namespace Gs\SequenceSolver;

interface ResultSetInterface
{
    /**
     * @param $line
     * @param $result
     * @return
     */
    public function add($line, $result);
}
