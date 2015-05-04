Feature: Palindrome
  In order to see if a word is a palindrome
  As an avid wordsmith
  I need to be able to print the result of a word

  @api
  Scenario: Check a palindrome
    Given the word I want to check is "Hannah"
    Then I should see a correct result

  @api
  Scenario: Check a prime number
    Given the prime number I want to check is "199"
    Then I should see a incorrect result
