<?php

namespace VK\Page\FrontPages;


use SensioLabs\Behat\PageObjectExtension\PageObject\Element;
use VK\Page\BasePage;
class MainPage extends BasePage
{
    /**
     * @var string
     */
    protected $path = 'http://palto-deti.ru/';

    protected $elements = [
        'lnkFirstItem' => ['xpath' => '//ul[@class=\'products\']/li[@class=\'first post-672 product type-product status-publish has-post-thumbnail product_cat-6 pa_-22 pa_-23 pa_-25 pa_-24 pa_-26 shipping-taxable purchasable product-type-variable product-cat-%d0%be%d0%b4%d0%b5%d0%b6%d0%b4%d0%b0-%d0%b4%d0%bb%d1%8f-%d0%b4%d0%b5%d1%82%d0%b5%d0%b9 instock\']/a[@class=\'button add_to_cart_button product_type_variable\']'],
        'lnkGoToSecondPage' => ['xpath' => '//main[@id=\'main\']/div[@class=\'storefront-sorting\'][1]/nav[@class=\'woocommerce-pagination\']/ul[@class=\'page-numbers\']/li[2]/a'],
        'lnkGoToThirdPage' => ['xpath' => '//main[@id=\'main\']/div[@class=\'storefront-sorting\'][1]/nav[@class=\'woocommerce-pagination\']/ul[@class=\'page-numbers\']/li[3]/a'],
    ];

    /**
     * @return Element
     */
    public function getLnkFirstItem()
    {
        return $this->getElement('lnkFirstItem');
    }

    /**
     * @return Element
     */
    public function getLnkGoToSecondPage()
    {
        return $this->getElement('lnkGoToSecondPage');
    }

    /**
     * @return Element
     */
    public function getLnkGoToThirdPage()
    {
        return $this->getElement('lnkGoToThirdPage');
    }
}