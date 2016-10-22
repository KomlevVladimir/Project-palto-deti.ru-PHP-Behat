<?php

namespace VK\Step;

use Behat\Behat\Hook\Scope\BeforeScenarioScope;
use VK\Data\Item;
use VK\Helpers\TestDataHelper;

class ClientContext extends BaseContext
{

    /**
     * @var \VK\Data\Item
     */
    private $item;

    /**
     * @BeforeScenario
     * @param BeforeScenarioScope $scope
     */
    public function beforeScenario(BeforeScenarioScope $scope)
    {
        $this->item = new Item();
    }

    /**
     * @Given /^client on the main page$/
     */
    public function clientOnTheMainPage()
    {
        $this->getMainPage()->open();
    }

    /**
     * @When /^client chooses (.*)$/
     */
    public function clientChoosesItem($itemName)
    {

        switch ($itemName) {
            case "Item from first page":
                $this->getMainPage()->getLnkFirstItem()->click();
                $this->item->name = $this->getFirstItemPage()->getTxtItemName()->getText();
                $this->item->price = $this->getFirstItemPage()->getTxtItemPrice()->getText();
                $this->item->id = $this->getFirstItemPage()->getTxtItemId()->getText();

                break;

            case "Item from second page":
                $this->getMainPage()->getLnkGoToSecondPage()->click();
                $this->getSecondPage()->getLnkSecondItem()->click();
                $this->item->name = $this->getSecondItemPage()->getTxtItemName()->getText();
                $this->item->price = $this->getSecondItemPage()->getTxtItemPrice()->getText();
                $this->item->id = $this->getSecondItemPage()->getTxtItemId()->getText();

                break;

            case "Item from third page":
                $this->getMainPage()->getLnkGoToThirdPage()->click();
                $this->getThirdPage()->getLnkThirdItem()->click();
                $this->item->name = $this->getThirdItemPage()->getTxtItemName()->getText();
                $this->item->price = $this->getThirdItemPage()->getTxtItemPrice()->getText();
                $this->item->id = $this->getThirdItemPage()->getTxtItemId()->getText();

                break;
        }
    }

    /**
     * @Given /^client  chooses (.*) of this item$/
     */
    public function clientChoosesSize($size)
    {
        $this->item->size = $size;

        switch ($size) {
            case "116":
                    $this->getFirstItemPage()->getLstSizes()->selectOption('122');

                break;

            case "134":
                $this->getSecondItemPage()->getLstSizes()->selectOption('134');

                break;

            case "110":
                $this->getThirdItemPage()->getLstSizes()->selectOption('116');

                break;
        }
    }

    /**
     * @Given /^client adds (.*) to cart$/
     */
    public function addsItemToCart($itemName)
    {
        switch ($itemName) {
            case "Item from first page":
                $this->getFirstItemPage()->getBtnAddToCart()->click();

                break;

            case "Item from second page":
                $this->getSecondItemPage()->getBtnAddToCart()->click();

                break;

            case "Item from third page":
                $this->getThirdItemPage()->getBtnAddToCart()->click();

                break;
        }
    }

    /**
     * @Given /^client goes to cart$/
     */
    public function goesToCart()
    {
        $this->getFirstItemPage()->getLnkGoToCart()->click();
    }


    /**
     * @Then /^item should be added to cart$/
     */
    public function itemShouldBeAddedToCart()
    {
        $expectedName = $this->item->name;
        $expectedPrice = $this->item->price;
        $expectedSize = $this->item->size;
        \PHPUnit_Framework_Assert::assertEquals(
            $expectedName,
            $this->getCartPage()->getRightName($this->item->name)->getText(),
            "Name is not displayed in the cart"
        );
        \PHPUnit_Framework_Assert::assertEquals(
            $expectedPrice,
            $this->getCartPage()->getRightPrice($this->item->price)->getText(),
            "Price is not displayed in the cart"
        );
        \PHPUnit_Framework_Assert::assertEquals(
            $expectedSize,
            $this->getCartPage()->getRightSize($this->item->size)->getText(),
            "Size is not displayed in the cart"
        );
    }

    /**
     * @Given /^item (.*) with (.*) added to cart$/
     * @Given /^item with (.*) and (.*) added to cart$/
     */
    public function itemAddedToCart($itemName, $size)
    {
        $this->clientOnTheMainPage();
        $this->clientChoosesItem($itemName);
        $this->clientChoosesSize($size);
        $this->addsItemToCart($itemName);
    }

    /**
     * @Given /^client on the cart page$/
     */
    public function clientOnTheCartPage()
    {
        $this->getCartPage()->open();
    }

    /**
     * @When /^client removes item from cart$/
     */
    public function clientRemovesItemFromCart()
    {
        $this->getCartPage()->getLnkRemoveItemFromCart()->click();
    }

    /**
     * @Then /^item should be removed from cart$/
     */
    public function itemShouldBeRemovedFromCart()
    {
        \PHPUnit_Framework_Assert::assertEquals(
            'Ваша корзина пока пуста.',
            $this->getCartPage()->getTxtCartIsEmpty()->getText(),
            "Item is not removed"
        );
    }

    /**
     * @Given /^item with (.*) and (.*) removed from cart$/
     */
    public function itemRemovedFromCart($itemName, $size)
    {
        $this->itemAddedToCart($itemName, $size);
        $this->clientOnTheCartPage();
        $this->clientRemovesItemFromCart();
    }

    /**
     * @When /^client return of canceled item to cart$/
     */
    public function clientReturnOfCanceledItemToCart()
    {
        $this->getCartPage()->getLnkReturnCanceledItem()->click();
    }

    /**
     * @Then /^canceled item should be returned to cart$/
     */
    public function canceledItemShouldBeReturnedToCart()
    {
        \PHPUnit_Framework_Assert::assertTrue(
            $this->getCartPage()->lnkItemNameIsPresent(),
            "Item did not return"
        );
        \PHPUnit_Framework_Assert::assertFalse(
            $this->getCartPage()->txtCartIsEmptyIsPresent(),
            "Item did not return"
        );
    }

    /**
     * @When /^client changes quantity of item from one to (.*)$/
     */
    public function clientChangesQuantityOfItem($itemQuantity)
    {
        $this->getCartPage()->getFldItemQuantity()->setValue($itemQuantity);
    }

    /**
     * @Given /^client updates the cart$/
     */
    public function clientUpdatesTheCart()
    {
        $this->getCartPage()->getBtnUpdateCart()->click();
    }

    /**
     * @Then /^total amount should be increased (.*) times$/
     */
    public function totalAmountShouldBeIncreased($itemQuantity)
    {
        $expectedTotalAmount = (substr(str_replace(",", "", ($this->item->price)), 0, -8)) * $itemQuantity;
        $actualTotalAmount = substr(str_replace(",", "", ($this->getCartPage()->getTxtTotalAmount()->getText())), 0, -8);
        \PHPUnit_Framework_Assert::assertEquals($expectedTotalAmount, $actualTotalAmount,  "Wrong total amount");

    }

    /**
     * @When /^client with (.*), (.*), (.*), (.*), (.*), (.*), (.*), (.*) registrates his order for (.*) (.*)$/
     */
    public function clientRegistratesHisOrderFor(
        $firstName, $lastName, $email,
        $phoneNumber, $address, $locality, $region, $postIndex,
        $isEnabledCashPayment, $isEnabledYandexPayment)
    {
        $this->getCartPage()->getBtnGoToRegistration()->click();
        if ($firstName === 'random') {
            $firstName = TestDataHelper::GetRandomFirstName();
        }
        if ($lastName === 'random') {
            $lastName = TestDataHelper::GetRandomLastName();
        }
        if ($email === 'random') {
            $email = TestDataHelper::GetRandomEmail();
        }
        if ($address === 'random') {
            $address = TestDataHelper::GetRandomStreet();
        }
        if ($locality === 'random') {
            $locality = TestDataHelper::GetRandomCity();
        }
        if ($region === 'random') {
            $region = TestDataHelper::GetRandomRegion();
        }
        if ($postIndex === 'random') {
            $postIndex = TestDataHelper::GetRandomPostIndex();
        }
        $this->getRegistrationOrderPage()->fillRegistrationFileds(
            $firstName, $lastName, $email, $phoneNumber, $address,
            $locality, $region, $postIndex, $isEnabledCashPayment,
            $isEnabledYandexPayment
        );
        $this->getRegistrationOrderPage()->getBtnPlaceOrder()->click();
    }

    /**
     * @Given /^client views item$/
     */
    public function clientViewsItem()
    {
        $this->getThirdItemPage()->getlnkViewItem()->click();
    }

    /**
     * @Then /^item should be zoomed$/
     */
    public function itemShouldBeZoomed()
    {
        \PHPUnit_Framework_Assert::assertTrue(
            $this->getThirdItemPage()->zoomedImageIsPresent(),
            "Item is not zoomed"
        );
    }

    /**
     * @Then /^should be redirected to the order received page$/
     */
    public function shouldBeRedirectedToTheOrderReceivedPage()
    {
        \PHPUnit_Framework_Assert::assertEquals(
            'Спасибо. Ваш заказ был принят.',
            $this->getOrderReceivedPage()->getTxtMessage()->getText(),
            "It is not received order page"
        );
    }

    /**
     * @Then /^should be redirected to the yandex money page$/
     */
    public function shouldBeRedirectedToTheYandexMoneyPage()
    {
        \PHPUnit_Framework_Assert::assertTrue(
            $this->getYandexAuthPopup()->yandexLogoIsPresent(),
            "It is not yandex money page"
        );
    }

    /**
     * @When /^client uses search for find (.*)$/
     */
    public function clientUsesSearch($itemName)
    {
        $this->getHeaderBlockElement()->getFldSearch()->setValue($itemName . "\n");
    }

    /**
     * @Then /^item should be found$/
     */
    public function itemShouldBeFound()
    {
        $actualResult = substr($this->getSearchResultPage()->getTxtFoundResult()->getText(), 0, 19);
        \PHPUnit_Framework_Assert::assertEquals('Показ всех', $actualResult, "Result is not found");
        \PHPUnit_Framework_Assert::assertTrue($this->getSearchResultPage()->allTittlesResultIsPresent());
    }

    /**
     * @Then /^item should not be found$/
     */
    public function itemShouldNotBeFound()
    {
        $actualMessage = $this->getSearchResultPage()->getTxtUnfoundResult()->getText();
        \PHPUnit_Framework_Assert::assertEquals(
            'Товаров, соответствующих вашему запросу, не обнаружено.',
            $actualMessage,
            "Unfound result message is not displayed"
        );
        \PHPUnit_Framework_Assert::assertFalse($this->getSearchResultPage()->allTittlesResultIsPresent());
    }

    /**
     * @When /^client follow to (.*)$/
     */
    public function clientFollowToLink($link)
    {
        switch ($link) {
            case "About shop":
                $this->getHeaderBlockElement()->getLnkAboutShop()->click();

                break;

            case "Payment and delivery":
                $this->getHeaderBlockElement()->getLnkPaymentAndDelivery()->click();

                break;

            case "Contacts":
                $this->getHeaderBlockElement()->getLnkContacts()->click();

                break;

            case "Clothes for children":
                $this->getHeaderBlockElement()->getLnkClothesForChildren()->click();

                break;

            case "Clothes for women":
                $this->getHeaderBlockElement()->getLnkClothesForWomen()->click();

                break;

            case "Clothes for men":
                $this->getHeaderBlockElement()->getLnkClothesForMen()->click();

                break;
        }
    }

    /**
     * @Then /^page (.*) should be opened$/
     */
    public function pageShouldBeOpened($link)
    {
        switch ($link) {
            case "About shop":
                \PHPUnit_Framework_Assert::assertEquals(
                    'О магазине',
                    $this->getAboutShopPage()->getTxtTittle()->getText(),
                    "It is not about shop page"
                );
                \PHPUnit_Framework_Assert::assertContains(
                    '/%d0%be-%d0%ba%d0%be%d0%bc%d0%bf%d0%b0%d0%bd%d0%b8%d0%b8/',
                    $this->getAboutShopPage()->getSession()->getCurrentUrl(),
                    "Wrong URL"
                );

                break;

            case "Payment and delivery":
                \PHPUnit_Framework_Assert::assertEquals(
                    'Оплата и доставка',
                    $this->getPaymentAndDeliveryPage()->getTxtTittle()->getText(),
                    "It is not payment and delivery page"
                );
                \PHPUnit_Framework_Assert::assertContains(
                    '/%d0%be%d0%bf%d0%bb%d0%b0%d1%82%d0%b0-%d0%b8-%d0%b4%d0%be%d1%81%d1%82%d0%b0%d0%b2%d0%ba%d0%b0/',
                    $this->getPaymentAndDeliveryPage()->getSession()->getCurrentUrl(),
                    "Wrong URL"
                );

                break;

            case "Contacts":
                \PHPUnit_Framework_Assert::assertEquals(
                    'Контакты',
                    $this->getContactsPage()->getTxtTittle()->getText(),
                    "It is not contatcs page"
                );
                \PHPUnit_Framework_Assert::assertContains(
                    '/%d0%ba%d0%be%d0%bd%d1%82%d0%b0%d0%ba%d1%82%d1%8b/',
                    $this->getContactsPage()->getSession()->getCurrentUrl(),
                    "Wrong URL"
                );

                break;

            case "Clothes for children":
                \PHPUnit_Framework_Assert::assertEquals(
                    'Одежда для детей',
                    $this->getClothesForChildrenPage()->getTxtTittle()->getText(),
                    "It is not clothes for children page"
                );
                \PHPUnit_Framework_Assert::assertContains(
                    '/%D0%BE%D0%B4%D0%B5%D0%B6%D0%B4%D0%B0-%D0%B4%D0%BB%D1%8F-%D0%B4%D0%B5%D1%82%D0%B5%D0%B9/',
                    $this->getClothesForChildrenPage()->getSession()->getCurrentUrl(),
                    "Wrong URL"
                );

                break;

            case "Clothes for women":
                \PHPUnit_Framework_Assert::assertEquals(
                    'Одежда для женщин',
                    $this->getClothesForWomenPage()->getTxtTittle()->getText(),
                    "It is not clothes for women page"
                );
                \PHPUnit_Framework_Assert::assertContains(
                    '/%D0%BE%D0%B4%D0%B5%D0%B6%D0%B4%D0%B0-%D0%B4%D0%BB%D1%8F-%D0%B6%D0%B5%D0%BD%D1%89%D0%B8%D0%BD/',
                    $this->getClothesForWomenPage()->getSession()->getCurrentUrl(),
                    "Wrong URL"
                );

                break;

            case "Clothes for men":
                \PHPUnit_Framework_Assert::assertEquals(
                    'Одежда для мужчин',
                    $this->getClothesForMenPage()->getTxtTittle()->getText(),
                    "It is not clothes for men page"
                );
                \PHPUnit_Framework_Assert::assertContains(
                    '/%D0%BE%D0%B4%D0%B5%D0%B6%D0%B4%D0%B0-%D0%B4%D0%BB%D1%8F-%D0%BC%D1%83%D0%B6%D1%87%D0%B8%D0%BD/',
                    $this->getClothesForMenPage()->getSession()->getCurrentUrl(),
                    "Wrong URL"
                );

                break;
        }
    }
}