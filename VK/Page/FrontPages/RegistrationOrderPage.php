<?php

namespace VK\Page\FrontPages;


use SensioLabs\Behat\PageObjectExtension\PageObject\Element;
use VK\Elements\Checkbox;
use VK\Page\BasePage;
class RegistrationOrderPage extends BasePage
{
    /**
     * @var string
     */
    protected $path = '/checkout/';

    protected $elements = [
        'fldFirstName' => ['xpath' => '//p[@id=\'billing_first_name_field\']/input[@id=\'billing_first_name\']'],
        'fldLastName' => ['xpath' => '//p[@id=\'billing_last_name_field\']/input[@id=\'billing_last_name\']'],
        'fldOrganization' => ['xpath' => '//p[@id=\'billing_company_field\']/input[@id=\'billing_company\']'],
        'fldEmail' => ['xpath' => '//p[@id=\'billing_email_field\']/input[@id=\'billing_email\']'],
        'fldPhone' => ['xpath' => '//p[@id=\'billing_phone_field\']/input[@id=\'billing_phone\']'],
        'fldAdress' => ['xpath' => '//p[@id=\'billing_address_1_field\']/input[@id=\'billing_address_1\']'],
        'fldCity' => ['xpath' => '//p[@id=\'billing_city_field\']/input[@id=\'billing_city\']'],
        'fldRegion' => ['xpath' => '//p[@id=\'billing_state_field\']/input[@id=\'billing_state\']'],
        'fldPostIndex' => ['xpath' => '//p[@id=\'billing_postcode_field\']/input[@id=\'billing_postcode\']'],
        'chkCashPayment' => ['xpath' => '//input[@id=\'payment_method_cod\']'],
        'chkYandexPayment' => ['xpath' => '//input[@id=\'payment_method_yandex_money\']'],
        'btnPlaceOrder' => ['xpath' => '//input[@id=\'place_order\']'],
    ];


    /**
     * @return Element
     */
    public function getFldFirstName()
    {
        $this->waitElement('fldFirstName');

        return $this->getElement('fldFirstName');
    }

    /**
     * @return Element
     */
    public function getFldLastName()
    {
        $this->waitElement('fldLastName');
        return $this->getElement('fldLastName');
    }

    /**
     * @return Element
     */
    public function getFldEmail()
    {
        return $this->getElement('fldEmail');
    }

    /**
     * @return Element
     */
    public function getFldPhone()
    {
        return $this->getElement('fldPhone');
    }

    /**
     * @return Element
     */
    public function getFldAdress()
    {
        return $this->getElement('fldAdress');
    }

    /**
     * @return Element
     */
    public function getFldCity()
    {
        return $this->getElement('fldCity');
    }

    /**
     * @return Element
     */
    public function getFldRegion()
    {
        return $this->getElement('fldRegion');
    }

    /**
     * @return Element
     */
    public function getFldPostIndex()
    {
        return $this->getElement('fldPostIndex');
    }

    /**
     * @return Checkbox
     */
    public function getChkCashPayment()
    {
        $this->waitElement('chkCashPayment');

        return $this->getCheckbox('chkCashPayment');
    }

    /**
     * @return Checkbox
     */
    public function getChkYandexPayment()
    {
        $this->waitElement('chkYandexPayment');

        return $this->getCheckbox('chkYandexPayment');
    }

    /**
     * @return Element
     */
    public function getBtnPlaceOrder()
    {
        return $this->getElement('btnPlaceOrder');
    }


    public function fillRegistrationFileds(
        $firstName, $lastName, $email,
        $phoneNumber, $address, $locality, $region, $postIndex,
        $isEnabledCashPayment, $isEnabledYandexPayment
    )
    {
        $this->getFldFirstName()->setValue($firstName);
        $this->getFldLastName()->setValue($lastName);
        $this->getFldEmail()->setValue($email);
        $this->getFldPhone()->setValue($phoneNumber);
        $this->getFldAdress()->setValue($address);
        $this->getFldCity()->setValue($locality);
        $this->getFldRegion()->setValue($region);
        $this->getFldPostIndex()->setValue($postIndex);
        $this->getChkCashPayment()->setValue($isEnabledCashPayment);
        $this->getChkYandexPayment()->setValue($isEnabledYandexPayment);
    }
}