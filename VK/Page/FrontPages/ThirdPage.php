<?php

namespace VK\Page\FrontPages;

use SensioLabs\Behat\PageObjectExtension\PageObject\Element;
use VK\Page\BasePage;
class ThirdPage extends BasePage
{
    /**
     * @var string
     */
    protected $path = '/product-category/%D0%BE%D0%B4%D0%B5%D0%B6%D0%B4%D0%B0-%D0%B4%D0%BB%D1%8F-%D0%B4%D0%B5%D1%82%D0%B5%D0%B9/page/3/';

    protected $elements = [
        'lnkThirdItem' => ['xpath' => '//ul[@class=\'products\']/li[2]/a'],
    ];

    /**
     * @return Element
     */
    public function getLnkThirdItem()
    {
        $this->waitElement('lnkThirdItem');

        return $this->getElement('lnkThirdItem');
    }
}