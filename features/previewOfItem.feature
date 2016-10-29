Feature: Preview of item
  In order to get visual information about item
  As a client
  I want to be able to zoom the item

  Scenario Outline: View item
    Given client is on the main page
    When client chooses <itemName>
    And client views item
    Then item should be zoomed

  Examples:
    |itemName             |
    |Item from third page |