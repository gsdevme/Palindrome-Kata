<?php

namespace Gs;

use Gs\SequenceSolver\ResultSetInterface;

class ResultSet implements \IteratorAggregate, ResultSetInterface
{
    private $result;

    public function __construct()
    {
        $this->result = [];
    }

    /**
     * @inheritdoc
     */
    public function add($line, $result)
    {
        array_push($this->result, ['line' => $line, 'result' => $result]);
    }

    /**
     * @return \ArrayIterator|\Traversable
     */
    public function getIterator()
    {
        return new \ArrayIterator($this->result);
    }
}
