<?php

namespace VK\Page\FrontPages;


use VK\Page\BasePage;
use SensioLabs\Behat\PageObjectExtension\PageObject\Element;
class ContactsPage extends BasePage
{
    /**
     * @var string
     */
    protected $path = '/%D0%BA%D0%BE%D0%BD%D1%82%D0%B0%D0%BA%D1%82%D1%8B/';

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