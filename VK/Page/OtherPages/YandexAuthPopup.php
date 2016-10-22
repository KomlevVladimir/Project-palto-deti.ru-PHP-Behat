<?php

namespace VK\Page\OtherPages;

use VK\Page\BasePage;
use SensioLabs\Behat\PageObjectExtension\PageObject\Element;
class YandexAuthPopup extends BasePage
{
    protected $elements = [
        'yandexLogo' => ['xpath' => '//div[@class=\'domik__roof\']/i[@class=\'domik__logo\']'],
        ];

    public function yandexLogoIsPresent()
    {
        $this->waitElement('yandexLogo');

        return $this->isElementPresent('yandexLogo');
    }
}