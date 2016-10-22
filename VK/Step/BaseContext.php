<?php

namespace VK\Step;

use Behat\Behat\Context\Context;
use Behat\MinkExtension\Context\MinkAwareContext;
use Behat\MinkExtension\Context\MinkContext;
use Behat\MinkExtension\Context\RawMinkContext;
use Behat\Mink\Session;
use SensioLabs\Behat\PageObjectExtension\Context\PageObjectAware;
use SensioLabs\Behat\PageObjectExtension\Context\PageObjectContext;
use SensioLabs\Behat\PageObjectExtension\PageObject\Page;
use SensioLabs\Behat\PageObjectExtension\PageObject\Element;
use Behat\Behat\Hook\Scope\AfterStepScope;
use Zend\EventManager\Exception\RuntimeException;

use VK\Page\FrontPages\MainPage;
use VK\Page\PageElements\HeaderBlockElement;
use VK\Page\FrontPages\FirstItemPage;
use VK\Page\FrontPages\CartPage;
use VK\Page\FrontPages\SecondPage;
use VK\Page\FrontPages\SecondItemPage;
use VK\Page\FrontPages\ThirdItemPage;
use VK\Page\FrontPages\ThirdPage;
use VK\Page\FrontPages\RegistrationOrderPage;
use VK\Page\FrontPages\OrderReceivedPage;
use VK\Page\OtherPages\YandexAuthPopup;
use VK\Page\FrontPages\SearchResultPage;
use VK\Page\FrontPages\AboutShopPage;
use VK\Page\FrontPages\PaymentAndDeliveryPage;
use VK\Page\FrontPages\ContactsPage;
use VK\Page\FrontPages\ClothesForChildrenPage;
use VK\Page\FrontPages\ClothesForWomenPage;
use VK\Page\FrontPages\ClothesForMenPage;

class BaseContext extends PageObjectContext
{
    /**
     * @return MainPage
     */
    public function getMainPage()
    {
        return $this->getPage("MainPage");
    }

    /**
     * @return HeaderBlockElement
     */
    public function getHeaderBlockElement()
    {
        return $this->getPage("HeaderBlockElement");
    }

    /**
     * @return FirstItemPage
     */
    public function getFirstItemPage()
    {
        return $this->getPage("FirstItemPage");
    }

    /**
     * @return CartPage
     */
    public function getCartPage()
    {
        return $this->getPage("CartPage");
    }

    /**
     * @return SecondPage
     */
    public function getSecondPage()
    {
        return $this->getPage("SecondPage");
    }

    /**
     * @return SecondItemPage
     */
    public function getSecondItemPage()
    {
        return $this->getPage("SecondItemPage");
    }

    /**
     * @return ThirdItemPage
     */
    public function getThirdItemPage()
    {
        return $this->getPage("ThirdItemPage");
    }

    /**
     * @return ThirdPage
     */
    public function getThirdPage()
    {
        return $this->getPage("ThirdPage");
    }

    /**
     * @return RegistrationOrderPage
     */
    public function getRegistrationOrderPage()
    {
        return $this->getPage("RegistrationOrderPage");
    }

    /**
     * @return OrderReceivedPage
     */
    public function getOrderReceivedPage()
    {
        return $this->getPage("OrderReceivedPage");
    }

    /**
     * @return YandexAuthPopup
     */
    public function getYandexAuthPopup()
    {
        return $this->getPage("YandexAuthPopup");
    }

    /**
     * @return SearchResultPage
     */
    public function getSearchResultPage()
    {
        return $this->getPage("SearchResultPage");
    }

    /**
     * @return AboutShopPage
     */
    public function getAboutShopPage()
    {
        return $this->getPage("AboutShopPage");
    }

    /**
     * @return PaymentAndDeliveryPage
     */
    public function getPaymentAndDeliveryPage()
    {
        return $this->getPage("PaymentAndDeliveryPage");
    }

    /**
     * @return ContactsPage
     */
    public function getContactsPage()
    {
        return $this->getPage("ContactsPage");
    }

    /**
     * @return ClothesForChildrenPage
     */
    public function getClothesForChildrenPage()
    {
        return $this->getPage("ClothesForChildrenPage");
    }

    /**
     * @return ClothesForWomenPage
     */
    public function getClothesForWomenPage()
    {
        return $this->getPage("ClothesForWomenPage");
    }

    /**
     * @return ClothesForMenPage
     */
    public function getClothesForMenPage()
    {
        return $this->getPage("ClothesForMenPage");
    }


}