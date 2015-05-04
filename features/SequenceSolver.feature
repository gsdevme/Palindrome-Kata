Feature: Sequence Solver
  In order to see if a group of words are palindromes
  As an avid wordsmith
  I need to be able to print the result of each word

  @web
  Scenario: Check a group of words
    Given I am on the homepage
    When I try the group of words:
    """
      3
      hannah
      steve
      jobs
      """
    Then I should see only one palindrome and two failed matches

