<?php


namespace VK\Page\FrontPages;


use VK\Page\BasePage;
use SensioLabs\Behat\PageObjectExtension\PageObject\Element;

class ClothesForMenPage extends BasePage
{
    /**
     * @var string
     */
    protected $path = '/product-category/%D0%BE%D0%B4%D0%B5%D0%B6%D0%B4%D0%B0-%D0%B4%D0%BB%D1%8F-%D0%BC%D1%83%D0%B6%D1%87%D0%B8%D0%BD/';

    protected $elements = [
        'txtTittle' => ['xpath' => '//h1[@class=\'page-title\']'],
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