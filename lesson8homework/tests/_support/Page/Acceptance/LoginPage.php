<?php
namespace Page\Acceptance;
/**
 * страница логина юзера
 */
class LoginPage
{
    /**
     * урл страницы логина
     */
    public static $URL = 'index.php?controller=authentication&back=my-account';

    /**
     * константа имейла для логина
     */
    public const EMAIL = 'aiasem98@gmail.com';

    /**
     * константа для пароля для логина
     */
    public const PASSWORD = 'qwerty';

    /**
     * селектор ввода для имела
     */
    public static $emailField = '//*[@id="email"]';

    /**
     * селектор ввода для пароля
     */
    public static $passwordField = '//*[@id="passwd"]';

    /**
     * селектор кнопки логин
     */
    public static $submitButton = '//*[@id="SubmitLogin"]';

    
     /**объект тестера
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

    /**
     * функция логина где заполняется поля имеила и пароля и авторизуется 
     */
    public function SignIn()
    {
        $this -> acceptanceTester -> scrollTo(self::$submitButton);
        $this -> acceptanceTester -> fillField(self::$emailField, self::EMAIL);
        $this -> acceptanceTester -> fillField(self::$passwordField,self::PASSWORD);
        $this -> acceptanceTester -> click(self::$submitButton);
    }

   
}
