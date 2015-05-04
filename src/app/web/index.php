<?php

require_once __DIR__ . '/../../../vendor/autoload.php';

$result = null;

if ((isset($_POST['palindrome-text-area'])) && (!empty($_POST['palindrome-text-area']))) {
    $adapter = new \Gs\TestCase\TextAreaAdapter($_POST['palindrome-text-area']);

    $sequenceService = new \Gs\SequenceSolver\SequenceService(new \Gs\PalindromeSolver(), new \Gs\ResultSet());
    $result          = $sequenceService->solve($adapter->getTestCases(), $adapter->getLimit());
}


function template($resultSet)
{
    include './template.php';
}

template($result);
