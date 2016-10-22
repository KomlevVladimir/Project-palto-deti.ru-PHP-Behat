<?php

namespace VK\Page\FrontPages;

use SensioLabs\Behat\PageObjectExtension\PageObject\Element;
use VK\Page\BasePage;
class FirstItemPage extends BasePage
{
    /**
     * @var string
     */
    protected $path = '/tovar/%D0%B1%D1%80%D1%8E%D0%BA%D0%B8-%D0%B7%D0%B8%D0%BC%D0%BD%D0%B8%D0%B5/';

    protected $elements = [
        'lstSizes' => ['xpath' => '//select[@id=\'pa_%d1%80%d0%b0%d0%b7%d0%bc%d0%b5%d1%80\']'],
        'btnAddToCart' => ['xpath' => '//div[@class=\'variations_button\']/button[@class=\'single_add_to_cart_button button alt\']'],
        'lnkGoToCart' => ['xpath' => '//div[@class=\'woocommerce-message\']/a'],
        'txtItemName' => ['xpath' => '//div[@class=\'summary entry-summary\']/h1[@class=\'product_title entry-title\']'],
        'txtItemPrice' => ['xpath' => '//div[@class=\'summary entry-summary\']/div[1]/p[@class=\'price\']/span[@class=\'amount\']'],
        'txtItemId' => ['xpath' => '//span[@class=\'sku_wrapper\']/span'],
    ];

    /**
     * @return Element
     */
    public function getLstSizes()
    {
        return $this->getElement('lstSizes');
    }

    /**
     * @return Element
     */
    public function getBtnAddToCart()
    {
        return $this->getElement('btnAddToCart');
    }

    /**
     * @return Element
     */
    public function getLnkGoToCart()
    {
        return $this->getElement('lnkGoToCart');
    }

    /**
     * @return Element
     */
    public function getTxtItemName()
    {
        $this->waitElement('txtItemName');

        return $this->getElement('txtItemName');
    }

    /**
     * @return Element
     */
    public function getTxtItemPrice()
    {
        $this->waitElement('txtItemPrice');

        return $this->getElement('txtItemPrice');
    }

    /**
     * @return Element
     */
    public function getTxtItemId()
    {
        $this->waitElement('txtItemId');

        return $this->getElement('txtItemId');
    }

}