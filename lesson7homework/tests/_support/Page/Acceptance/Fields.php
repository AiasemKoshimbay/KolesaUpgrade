<?php
namespace Page\Acceptance;
/**
 * класс для заполнения личных данных
 */
class Fields
{
     /**
     * локатор поля имени
     */
    public static $firstNameField = '//*[@id="firstName"]';

     /**
     * локатор поля фамилии
     */
    public static $lastNameField  = '//*[@id="lastName"]';

     /**
     * локатор поля имейла
     */
    public static $emailField  = '//*[@type="email"]';


    /**
     * локатор поля номера телефона
     */
    public static $phoneNumberField  =  '//*[@id="phoneNumber"]';

     /**
     * локатор поля адреса
     */
    public static $addressField  =  '//*[@id="address"]';

    /**
     * локатор поля города
     */
    public static $cityField = '//*[@id="city"]';


    /**
     * локатор поля региона
     */
    public static $stateField = '//*[@id="state"]';

     /**
     * локатор поля почтового индекса
     */
    public static $postalField = '//*[@id="postal"]';
    /**
     * локатор кнопки регистрации
     */
    public static $registerButton = '//*[@type="submit"]';


    /**
     * локатор радио кнопки кредитная карточка
     */
    public static $creditRadioButton ='//*[@id="input_32_paymentType_credit"]';
    
    /**Обьект тестера
     * @var \AcceptanceTester;
     */
    protected $acceptanceTester;

    /**
     * конструктор
     */
    public function __construct(\AcceptanceTester $I)
    {
        $this->acceptanceTester = $I;
    }

}
