<?php

namespace VK\Page\FrontPages;

use SensioLabs\Behat\PageObjectExtension\PageObject\Element;
use VK\Page\BasePage;
class ThirdItemPage extends BasePage
{
    /**
     * @var string
     */
    protected $path = '/tovar/%D1%83%D1%82%D0%B5%D0%BF%D0%BB%D0%B5%D0%BD%D0%BD%D0%B0%D1%8F-%D0%BA%D1%83%D1%80%D1%82%D0%BA%D0%B0-%D0%BD%D0%B0-%D0%BC%D0%B0%D0%BB%D1%8C%D1%87%D0%B8%D0%BA%D0%B0/';

    protected $elements = [
        'lstSizes' => ['xpath' => '//select[@id=\'pa_%d1%80%d0%b0%d0%b7%d0%bc%d0%b5%d1%80\']'],
        'txtItemName' => ['xpath' => '//div[@class=\'summary entry-summary\']/h1[@class=\'product_title entry-title\']'],
        'txtItemPrice' => ['xpath' => '//div[@class=\'summary entry-summary\']/div[1]/p[@class=\'price\']/span[@class=\'amount\']'],
        'txtItemId' => ['xpath' => '//span[@class=\'sku_wrapper\']/span'],
        'btnAddToCart' => ['xpath' => '//div[@class=\'variations_button\']/button[@class=\'single_add_to_cart_button button alt\']'],
        'lnkGoToCart' => ['xpath' => '//div[@class=\'woocommerce-message\']/a'],
        'lnkViewItem' => ['xpath' => '//a[@class=\'woocommerce-main-image zoom\']/img[@class=\'attachment-shop_single wp-post-image\']'],
        'zoomedImage' => ['xpath' => '//div[@class=\'pp_fade\']/div[@id=\'pp_full_res\']/img[@id=\'fullResImage\']'],
    ];

    /**
     * @return Element
     */
    public function getLstSizes()
    {
        $this->waitElement('lstSizes');

        return $this->getElement('lstSizes');
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

    /**
     * @return Element
     */
    public function getBtnAddToCart()
    {
        $this->waitElement('btnAddToCart');

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
    public function getlnkViewItem()
    {
        return $this->getElement('lnkViewItem');
    }

    public function zoomedImageIsPresent()
    {
        $this->waitElement('zoomedImage');

        return $this->isElementPresent('zoomedImage');
    }


}