Feature: Remove item from cart
  In order to delete unnecessary item
  As a client
  I want to be able to remove items from cart

Scenario Outline: Remove item from cart
  Given item with <itemName> and <size> is added to cart
  And client is on the cart page
  When client removes item from cart
  Then item should be removed from cart

  Examples:
  |itemName             |size |
  |Item from first page |110  |

Scenario Outline: Return of removed item to cart
  Given item with <itemName> and <size> is removed from cart
  When client returns removed item to cart
  Then removed item should be returned to cart

  Examples:
  |itemName              |size |
  |Item from second page |110  |

