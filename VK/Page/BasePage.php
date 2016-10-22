<?php
namespace VK\Page;

use SensioLabs\Behat\PageObjectExtension\PageObject\Page;
use Symfony\Component\Config\Definition\Exception\Exception;
use VK\Elements\Checkbox;
class BasePage extends Page
{
    public function isElementPresent($name)
    {
        try {
            $this->getElement($name);
        } catch (\Exception $e) {

            return False;
        }

        return True;
    }

    public function waitElement($name)
    {
        foreach (range(1, 10) as $i) {
            try {
                if ($this->isElementPresent($name)) {
                    break;
                }
            } catch (\Exception $e) { }
            sleep(1);
        }
        if (!$this->isElementPresent($name)) {
            throw new Exception('time out');
    }
    }

    /**
     * @param $name
     * @return Checkbox
     */
    public function getCheckbox($name)
    {
        return new Checkbox($this->getElement($name));
    }

}