<?php

namespace VK\Page\FrontPages;


use VK\Page\BasePage;
use SensioLabs\Behat\PageObjectExtension\PageObject\Element;
class OrderReceivedPage extends BasePage
{
    /**
     * @var string
     */
    protected $path = '/checkout/order-received/';

    protected $elements = [
        'txtTittle' => ['xpath' => '//header[@class=\'entry-header\']/h1[@class=\'entry-title\']'],
        'txtMessage' => ['xpath' => '//div[@class=\'entry-content\']/div[@class=\'woocommerce\']/p[1]'],
        ];

    /**
     * @return Element
     */
    public function getTxtMessage()
    {
        $this->waitElement('txtMessage');

        return $this->getElement('txtMessage');
    }
}