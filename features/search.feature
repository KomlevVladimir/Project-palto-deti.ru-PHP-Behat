Feature: Search of item
  In order to find items that I would like to purchase
  As a client
  I want to be able to search for items containing certain words

  Background:
    Given client on the main page

  Scenario Outline: Searching for existing item
    When client uses search for find <itemName>
    Then item should be found

  Examples:
    |itemName |
    |куртка   |

  Scenario Outline: Searching for unexisting item
    When client uses search for find <itemName>
    Then item should not be found

  Examples:
    |itemName |
    |футболка |
