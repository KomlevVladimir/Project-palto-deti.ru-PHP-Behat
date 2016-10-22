Feature: Changing quantity of items and updating the cart
  In order to change quantity of item on the cart page
  As a client
  I want to be able to change quantity of items and update the cart

  Scenario Outline: Update the cart
    Given item <itemName> with <size> added to cart
    And client on the cart page
    When client changes quantity of item from one to <itemQuantity>
    And client updates the cart
    Then total amount should be increased <itemQuantity> times

    Examples:
    |itemName             |size|itemQuantity|
    |Item from third page |116 |3           |

