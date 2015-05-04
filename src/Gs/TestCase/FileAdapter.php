<?php

namespace Gs\TestCase;

use Gs\TestCaseAdapterInterface;

class FileAdapter implements TestCaseAdapterInterface
{
    private $file;

    /**
     * @param \SplFileObject $file
     */
    public function __construct(\SplFileObject $file)
    {
        $this->file = $file;
    }

    /**
     * @inheritdoc
     */
    public function getTestCases()
    {
        $cases = [];
        $this->file->seek(1);

        for ($this->file; $this->file->valid(); $this->file->next()) {
            if (strlen($this->file->current()) > 0) {
                array_push($cases, trim($this->file->current()));
            }
        }

        return $cases;
    }

    /**
     * @inheritdoc
     */
    public function getLimit()
    {
        $this->file->fseek(0);

        $limit = (int)trim($this->file->fgets());

        if ($limit > 0) {
            return $limit;
        }

        return null;
    }
}
