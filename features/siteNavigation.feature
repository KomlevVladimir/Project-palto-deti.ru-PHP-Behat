Feature: Site navigation
  In order to navigate the shop
  As a client
  I want to be able to follow to links

  Scenario Outline: Site navigation
    Given client on the main page
    When client follow to <link>
    Then page <link> should be opened

    Examples:
    |link                |
    |About shop          |
    |Payment and delivery|
    |Contacts            |
    |Clothes for children|
    |Clothes for women   |
    |Clothes for men     |

