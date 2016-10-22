Feature: Order placement
  In order to process orders of clients
  As a store owner
  I want to users could registrate their orders

  Scenario Outline: Registration order for payment by cash
    Given item <itemName> with <itemSize> added to cart
    And client on the cart page
    When client with <firstName>, <lastName>, <email>, <$phoneNumber>, <address>, <locality>, <region>, <postIndex> registrates his order for <isEnabledCashPayment> <isEnabledYandexPayment>
    Then should be redirected to the order received page

  Examples:
    |itemName             |itemSize |firstName |lastName |email  |$phoneNumber |address |locality |region |postIndex |isEnabledCashPayment |isEnabledYandexPayment |
    |Item from first page |110      |random    |random   |random |1234567      |random  |random   |random |random    |1                    |0                      |

  Scenario Outline: Registration order for payment by yandex money
    Given item <itemName> with <itemSize> added to cart
    And client on the cart page
    When client with <firstName>, <lastName>, <email>, <$phoneNumber>, <address>, <locality>, <region>, <postIndex> registrates his order for <isEnabledCashPayment> <isEnabledYandexPayment>
    Then should be redirected to the yandex money page

  Examples:
    |itemName              |itemSize |firstName|lastName|email  |$phoneNumber |address |locality |region |postIndex |isEnabledCashPayment |isEnabledYandexPayment |
    |Item from second page |110      |random   |random  |random |1234567      |random  |random   |random |random    |0                    |1                      |


