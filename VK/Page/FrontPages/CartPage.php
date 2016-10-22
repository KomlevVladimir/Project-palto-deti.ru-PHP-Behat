<?php

namespace VK\Page\FrontPages;

use SensioLabs\Behat\PageObjectExtension\PageObject\Element;
use VK\Page\BasePage;
class CartPage extends BasePage
{
    /**
     * @var string
     */
protected $path = '/cart/';

    protected $elements = [
        'lnkReturnToShop' => ['xpath' => '//div[@class=\'woocommerce\']/p[@class=\'return-to-shop\']/a'],
        'lnkRemoveItemFromCart' => ['xpath' => '//div[@class=\'woocommerce\']/form/table[@class=\'shop_table cart\']/tbody/tr[@class=\'cart_item\']/td[@class=\'product-remove\']/a'],
        'txtCartIsEmpty' => ['xpath' => '//div[@class=\'entry-content\']/div[@class=\'woocommerce\']/p[@class=\'cart-empty\']'],
        'lnkReturnCanceledItem' => ['xpath' => '//div[@class=\'woocommerce\']/div[@class=\'woocommerce-message\']/a'],
        'lnkItemName' => ['xpath' => '//tbody/tr[@class=\'cart_item\']/td[@class=\'product-name\']/a'],
        'fldItemQuantity' => ['xpath' => '//tbody/tr[@class=\'cart_item\']/td[@class=\'product-quantity\']/div[@class=\'quantity\']/input[@class=\'input-text qty text\']'],
        'btnUpdateCart' => ['xpath' => '//tbody/tr[2]/td[@class=\'actions\']/input[@class=\'button\']'],
        'txtTotalAmount' => ['xpath' => '//table[@class=\'shop_table cart\']/tbody/tr[@class=\'cart_item\']/td[@class=\'product-subtotal\']/span[@class=\'amount\']'],
        'btnGoToRegistration' => ['xpath' => '//a[@class=\'checkout-button button alt wc-forward\']'],
    ];

    public function getRightName($name)
    {
        sleep(1);
        $i = 1;
        do {
            $element = $this->find('xpath', '//tbody/tr[' . $i . ']/td[3]/a');
            $i++;
        } while ($element == $name or $i == 20);

        return $element;
    }

    public function getRightPrice($price)
    {
        sleep(1);
        $i = 1;
        do {
            $element = $this->find('xpath', '//tbody/tr[' . $i . ']/td[4]/span');
            $i++;
        } while ($element == $price or $i == 20);

        return $element;
    }

    public function getRightSize($size)
    {
        sleep(1);
        $i = 1;
        do {
            $element = $this->find('xpath', '//tbody/tr[' . $i . ']/td/dl//p');
            $i++;
        } while ($element == $size or $i == 20);

        return $element;
    }

    /**
     * @return Element
     */
    public function getLnkReturnToShop()
    {
        $this->waitElement('lnkReturnToShop');

        return $this->getElement('lnkReturnToShop');
    }

    /**
     * @return Element
     */
    public function getLnkRemoveItemFromCart()
    {
        $this->waitElement('lnkRemoveItemFromCart');

        return $this->getElement('lnkRemoveItemFromCart');
    }

    /**
     * @return Element
     */
    public function getTxtCartIsEmpty()
    {
        $this->waitElement('txtCartIsEmpty');

        return $this->getElement('txtCartIsEmpty');
    }

    /**
     * @return Element
     */
    public function getLnkReturnCanceledItem()
    {
        $this->waitElement('lnkReturnCanceledItem');

        return $this->getElement('lnkReturnCanceledItem');
    }

    public function lnkItemNameIsPresent()
    {
        $this->waitElement('lnkItemName');

        return $this->isElementPresent('lnkItemName');
    }

    public function txtCartIsEmptyIsPresent()
    {
        return $this->isElementPresent('txtCartIsEmpty');
    }

    /**
     * @return Element
     */
    public function getFldItemQuantity()
    {
        $this->waitElement('fldItemQuantity');

        return $this->getElement('fldItemQuantity');
    }

    /**
     * @return Element
     */
    public function getBtnUpdateCart()
    {
        $this->waitElement('btnUpdateCart');

        return $this->getElement('btnUpdateCart');
    }

    /**
     * @return Element
     */
    public function getTxtTotalAmount()
    {
        $this->waitElement('txtTotalAmount');

        return $this->getElement('txtTotalAmount');
    }

    /**
     * @return Element
     */
    public function getBtnGoToRegistration()
    {
        $this->waitElement('btnGoToRegistration');

        return $this->getElement('btnGoToRegistration');
    }
}