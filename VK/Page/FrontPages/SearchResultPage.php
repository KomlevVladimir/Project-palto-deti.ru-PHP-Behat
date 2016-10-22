<?php

namespace VK\Page\FrontPages;

use VK\Page\BasePage;
use SensioLabs\Behat\PageObjectExtension\PageObject\Element;

class SearchResultPage extends BasePage
{
    protected $elements = [
        'txtFoundResult' => ['xpath' => '//div[@class=\'storefront-sorting\'][1]/p[1]'],
        'allTittlesResult' => ['xpath' => '//a/h3'],
        'txtUnfoundResult' => ['xpath' => '//main[@id=\'main\']/p[@class=\'woocommerce-info\']'],
        ];

    /**
     * @return Element
     */
    public function getTxtFoundResult()
    {
        $this->waitElement('txtFoundResult');

        return $this->getElement('txtFoundResult');
    }

    public function allTittlesResultIsPresent()
    {

        return $this->isElementPresent('allTittlesResult');
    }

    /**
     * @return Element
     */
    public function getTxtUnfoundResult()
    {
        $this->waitElement('txtUnfoundResult');

        return $this->getElement('txtUnfoundResult');
    }

}