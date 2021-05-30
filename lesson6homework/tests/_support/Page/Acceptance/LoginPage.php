<?php
namespace Page\Acceptance;
 /**
     * Класс страницы логин
     */
class LoginPage
{
    /**
     * урл страницы авторизации
     */
    public static $URL = '';

     /**
     * заблокированный юзернейм для  авторизации
     */
    public const LOCKED_USERNAME = 'locked_out_user';

     /**
     * стандартный пароль для успешной авторизации
     */
    public const PASSWORD = 'secret_sauce';
    

    /**
     * селектор ввода поля для юзернейма 
     */
    public static $loginInput  ='#user-name';

     /**
     * селектор ввода поля для пароля
     */
    public static  $passwordInput = '#password';
    /**
     * селектор кнопки авторизации
     */
    public static $loginButton  = '#login-button';

    /**
     * селектор блока ошибки при  авторизации
     */
    public static $errorBlock  = '//*[@id="login_button_container"]//h3';


    /**
     * селектор кнопки ошибки 
     */
    public static $errorButton ='.error-button';


    /** Обьект Tester -a 
     * @var \AcceptanceTester;
     */
    protected $acceptanceTester;

    /**
     * Конструктор
     */
    public function __construct(\AcceptanceTester $I)
    {
        $this->acceptanceTester = $I;
    }
    /**
     * Заполняет поля  юзернейма и пароля
     */
    public function fillUserPassFields()
    {
        $this -> acceptanceTester -> fillField(self::$loginInput, self::LOCKED_USERNAME);
        $this -> acceptanceTester -> fillField(self::$passwordInput,self::PASSWORD);
        return $this;
    }
    
    /**
     * Нажимает на кнопку логина
     */
    public function clickLoginButton()
    {
        $this -> acceptanceTester -> click(self::$loginButton);
        return $this;
        
    }
    /**
     * Ждет ошибку блока при авторизации
     */
    public function catchErrorBlock()
    {
        $this-> acceptanceTester -> waitForText('Epic sadface:',5,self::$errorBlock);
        return $this;
    }
    
    /**
     * Закрывает блок ошибки и проверяет что блок ошибки исчез
     */
    public function closeErrorAndCheck()
    {
        $this-> acceptanceTester -> click(self::$errorButton);
        $this ->acceptanceTester -> dontseeElement(self::$errorBlock);
    }
    
    
   
    

}
