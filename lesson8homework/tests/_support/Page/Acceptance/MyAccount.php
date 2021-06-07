<?php
namespace Page\Acceptance;
/**
 * класс для страницы личного кабинета
 */
class MyAccount
{
    /**
     * урл страницы личного кабинета
     */
    public static $URL = 'index.php?controller=my-account';

    /**
     * селектор хедера в страницы личного кабинет
     */
    public static $titleHeader = '//*[@id="center_column"]/h1';

    /**
     * селектор кнопки мои избранные
     */
    public static $myWishLists = '//*[@title="My wishlists"]';


    /**Объект тестера
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
