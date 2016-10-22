<?php

namespace VK\Page\FrontPages;


use VK\Page\BasePage;
use SensioLabs\Behat\PageObjectExtension\PageObject\Element;
class PaymentAndDeliveryPage extends BasePage
{
    /**
     * @var string
     */
    protected $path = '/%D0%BE%D0%BF%D0%BB%D0%B0%D1%82%D0%B0-%D0%B8-%D0%B4%D0%BE%D1%81%D1%82%D0%B0%D0%B2%D0%BA%D0%B0/';

    protected $elements = [
        'txtTittle' => ['xpath' => '//h1[@class=\'entry-title\']'],
    ];

    /**
     * @return Element
     */
    public function getTxtTittle()
    {
        $this->waitElement('txtTittle');

        return $this->getElement('txtTittle');
    }
}