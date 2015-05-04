<?php

use Behat\Behat\Context\Context;
use Behat\Behat\Context\SnippetAcceptingContext;
use Behat\Gherkin\Node\PyStringNode;
use Behat\MinkExtension\Context\RawMinkContext;
use PHPUnit_Framework_Assert as PHPUnit;

class WebContext extends RawMinkContext implements Context, SnippetAcceptingContext
{
    private static $pid;

    /**
     * @beforeFeature
     */
    public static function startWebServer()
    {
        self::$pid = self::startBuiltInHttpd('localhost', 8080, './src/app/web/');
        sleep(2);
    }

    /**
     * @afterFeature
     */
    public static function stopWebServer()
    {
        exec('kill ' . (int)self::$pid);
    }


    private static function startBuiltInHttpd($host, $port, $documentRoot)
    {
        $command = sprintf('php -S %s:%d -t %s >/dev/null 2>&1 & echo $!',
            $host,
            $port,
            $documentRoot);
        $output  = array();

        exec($command, $output);

        return (int)$output[0];
    }

    private function pageSetupFactory($field)
    {
        $session = $this->getSession();
        $session->visit($this->locatePath('/'));

        $page = $session->getPage();
        $page->fillField('palindrome-text-area', $field);
        $page->pressButton('submit');
    }

    /**
     * @Given the word I want to check is :word
     */
    public function theWordIWantToCheckIs($word)
    {
        $field = <<<TEXTAREA
1
$word
TEXTAREA;

        $this->pageSetupFactory($field);
    }

    /**
     * @Then I should see a correct result
     */
    public function iShouldSeeACorrectResult()
    {
        $page = $this->getSession()->getPage();
        PHPUnit::assertEquals($page->findById('value')->getText(), 'Y');
    }

    /**
     * @Given the prime number I want to check is :number
     */
    public function thePrimeNumberIWantToCheckIs($number)
    {
        $field = <<<TEXTAREA
1
$number
TEXTAREA;

        $this->pageSetupFactory($field);
    }

    /**
     * @Then I should see a incorrect result
     */
    public function iShouldSeeAIncorrectResult()
    {
        $page = $this->getSession()->getPage();
        PHPUnit::assertEquals($page->findById('value')->getText(), 'N');
    }

    /**
     * @Given I am on the homepage
     */
    public function iAmOnTheHomepage()
    {
    }

    /**
     * @When I try the group of words:
     */
    public function iTryTheGroupOfWords(PyStringNode $words)
    {
        $this->pageSetupFactory($words->getRaw());
    }

    /**
     * @Then I should see only one palindrome and two failed matches
     */
    public function iShouldSeeOnlyOnePalindromeAndTwoFailedMatches()
    {
        $page = $this->getSession()->getPage();

        PHPUnit::assertEquals(2, substr_count($page->getText(), 'N'));
        PHPUnit::assertEquals(1, substr_count($page->getText(), 'Y'));
    }
}
