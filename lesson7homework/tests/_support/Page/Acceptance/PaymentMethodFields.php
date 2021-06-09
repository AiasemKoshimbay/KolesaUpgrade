<?php
namespace Page\Acceptance;
/**
 * класс для  заполнения полей оплаты
 */
class PaymentMethodFields
{
    /**
     * таблица оплаты при выборе кнопки радио кредит
     */
    public static $paymentTable = '//*[@id="creditCardTable"]';

    /**
     * локатор поля имя при оплате
     */
    public static $firstNameField = '//*[@data-component="cc_firstName"]';

    /**
     * локатор поля фамилии при оплате
     */
    public static $lastNameField = '//*[@data-component="cc_lastName"]';

    /**
     * локатор поля номера кредитной карточки
     */
    public static $creditCardNumField = '//*[@data-component="cc_number"]';

    /**
     * локатор поля секретного кода
     */
    public static $securityCode = '//*[@data-component="cc_ccv"]';

    /**
     * локатор выбора  месяца окончания срока действия карты
     */
    public static $expirationMonthSelect = '//*[@data-component="cc_exp_month"]';

    /**
     * селектор опции выбора месяца
     */
    public static $optionMonth = '#input_32_cc_exp_month > option';

    /**
     * локатор выбора года окончания срока действия карты
     */
    public static $expirationYearSelect = '//*[@data-component="cc_exp_year"]';

    /**
     * локатор выбора опции года
     */
    public static $optionYear = '#input_32_cc_exp_year > option';

    /**
     * локатор поля адреса клиента для оплаты
     */
    public static $billAddress = '//*[@data-component="addr_line1"]';

    /**
     * селектор поля города для оплаты
     */
    public static $billCity = '#input_32_city';

    /**
     * селектор поля провинции для оплаты
     */
    public static $billState = '#input_32_state';

    /**
     * селектор поля почтового индекса
     */
    public static $zipcode = '#input_32_postal';

    /**
     * селектор поля страны для оплаты
     */
    public static $countySelect = '//*[@data-component="country"]';

    /**
     * локатор поля выбора страны
     */
    public static $optionCountry = '#input_32_country > option';


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
