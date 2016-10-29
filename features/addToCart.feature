Feature: Add item to cart
  In order to buy item
  As a client
  I need to be able to add interesting items into a cart

  Scenario Outline: Add items to cart from different pages
    Given client is on the main page
    When client chooses <itemName>
    And client  chooses <size> of this item
    And client adds <itemName> to cart
    And client goes to cart
    Then item should be added to cart

  Examples:
    |itemName              |size |
    |Item from first page  |116  |
    |Item from second page |110  |
    |Item from third page  |110  |



