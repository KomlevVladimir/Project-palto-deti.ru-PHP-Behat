<?php

namespace VK\Page\FrontPages;


use VK\Page\BasePage;
use SensioLabs\Behat\PageObjectExtension\PageObject\Element;
class AboutShopPage extends BasePage
{
    /**
     * @var string
     */
    protected $path = '/%D0%BE-%D0%BA%D0%BE%D0%BC%D0%BF%D0%B0%D0%BD%D0%B8%D0%B8/';

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