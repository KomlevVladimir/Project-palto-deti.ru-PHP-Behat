<?php

namespace VK\Page\FrontPages;

use SensioLabs\Behat\PageObjectExtension\PageObject\Element;
use VK\Page\BasePage;
class SecondPage extends BasePage
{
    /**
     * @var string
     */
    protected $path = '/tovar/%D1%82%D0%B5%D0%BF%D0%BB%D1%8B%D0%B9-%D0%BA%D0%BE%D0%BC%D0%B1%D0%B8%D0%BD%D0%B5%D0%B7%D0%BE%D0%BD/';

    protected $elements = [
        'lnkSecondItem' => ['xpath' => '//ul[@class=\'products\']/li[5]/a'],
    ];

    /**
     * @return Element
     */
    public function getLnkSecondItem()
    {
        $this->waitElement('lnkSecondItem');

        return $this->getElement('lnkSecondItem');
    }
}