<?php

use Behat\Behat\Context\Context;
use PHPUnit_Framework_Assert as PHPUnit;

/**
 * Defines application features from the specific context.
 */
class PalindromeContext implements Context
{
    private $result;
    private $solver;

    /**
     * Initializes context.
     *
     * Every scenario gets its own context instance.
     * You can also pass arbitrary arguments to the
     * context constructor through behat.yml.
     */
    public function __construct()
    {
        $this->solver = new \Gs\PalindromeSolver();
    }

    /**
     * @Given the word I want to check is :word
     */
    public function theWordIWantToCheckIs($word)
    {

        $this->result = $this->solver->solve($word);
    }

    /**
     * @Then I should see a correct result
     */
    public function iShouldSeeACorrectResult()
    {
        PHPUnit::assertTrue($this->result);
    }

    /**
     * @Given the prime number I want to check is :number
     */
    public function thePrimeNumberIWantToCheckIs($number)
    {
        $this->result = $this->solver->solve($number);
    }

    /**
     * @Then I should see a incorrect result
     */
    public function iShouldSeeAIncorrectResult()
    {
        PHPUnit::assertFalse($this->result);
    }


}
