<?php

namespace VK\Page\PageElements;

use SensioLabs\Behat\PageObjectExtension\PageObject\Element;
use VK\Page\BasePage;
class HeaderBlockElement extends BasePage
{
    protected $elements = [
        'btnCart' => ['xpath' => '//li[1]/a[@class=\'cart-contents\']'],
        'fldSearch' => ['xpath' => '//div[@id=\'page\']/header[@id=\'masthead\']/div[@class=\'col-full\']/div[@class=\'site-search\']/div[@class=\'widget woocommerce widget_product_search\']/form[@class=\'woocommerce-product-search\']/input[@class=\'search-field\']'],
        'lnkAboutShop' => ['xpath' => '//li[@id=\'menu-item-52\']/a'],
        'lnkPaymentAndDelivery' => ['xpath' => '//li[@id=\'menu-item-51\']/a'],
        'lnkContacts' => ['xpath' => '//li[@id=\'menu-item-50\']/a'],
        'lnkClothesForChildren' => ['xpath' => '//li[@id=\'menu-item-16\']/a'],
        'lnkClothesForWomen' => ['xpath' => '//li[@id=\'menu-item-17\']/a'],
        'lnkClothesForMen' => ['xpath' => '//li[@id=\'menu-item-18\']/a'],
    ];

    /**
     * @return Element
     */
    public function getBtnCart()
    {
        $this->getElement('btnCart');
    }

    /**
     * @return Element
     */
    public function getFldSearch()
    {
        $this->waitElement('fldSearch');

        return $this->getElement('fldSearch');
    }

    /**
     * @return Element
     */
    public function getLnkAboutShop()
    {
        $this->waitElement('lnkAboutShop');

        return $this->getElement('lnkAboutShop');
    }

    /**
     * @return Element
     */
    public function getLnkPaymentAndDelivery()
    {
        $this->waitElement('lnkPaymentAndDelivery');

        return $this->getElement('lnkPaymentAndDelivery');
    }

    /**
     * @return Element
     */
    public function getLnkContacts()
    {
        $this->waitElement('lnkContacts');

        return $this->getElement('lnkContacts');
    }

    /**
     * @return Element
     */
    public function getLnkClothesForChildren()
    {
        $this->waitElement('lnkClothesForChildren');

        return $this->getElement('lnkClothesForChildren');
    }

    /**
     * @return Element
     */
    public function getLnkClothesForWomen()
    {
        $this->waitElement('lnkClothesForWomen');

        return $this->getElement('lnkClothesForWomen');
    }

    /**
     * @return Element
     */
    public function getLnkClothesForMen()
    {
        $this->waitElement('lnkClothesForMen');

        return $this->getElement('lnkClothesForMen');
    }
}