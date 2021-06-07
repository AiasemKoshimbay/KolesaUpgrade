<?php
namespace Page\Acceptance;
/**
 * главная страница магазина
 */
class MainPage
{
    /**
     * урл главной страницы
     */
    public static $URL = '';

    /**
     * селектор кнопки логина
     */
    public static $signInButton = '.login';

    /**
     * селектор первой карточки
     */
    public static $firstProductCard = '//*[@id="homefeatured"]/li[1]';

    /**
     * селектор i-тый карточки
     */
    public static $productCard = '//*[@id="homefeatured"]/li[%s]';

    /**
     * селектор i-тый карточки кнопки quick view
     */
    public static $quickView = '#homefeatured > li:nth-child(%d) > div > div.left-block > div > a.quick-view > span';

    /**
     * селектор айфрейма карточки
     */
    public static $iframeCard = '//*[@class="fancybox-iframe"]';

    /**
     * селектор картинки карточки в айфрейме
     */
    public static $imageCard = '#image-block';

    /**
     * селектор кнопки добавить в избранное
     */
    public static $AddWishListButton = '//*[@id="wishlist_button"]';

    /**
     * успешное сообщение после добавления товара в избранное
     */
    public static $successMessage = 'Added to your wishlist.';

    /**
     * селектор кнопки закрытия 
     */
    public static $closeButton = '//*[@title="Close"]';

    /**
     * селектор профиля в главной странице
     */
    public static $accountButton = '//*[@class="account"]';


    /**
     * селектор кнопки выйти 
     */
    public static $logOutButton = '//*[@title="Log me out"]';
    
    

    /**Объект тестера
     * @var \AcceptanceTester;
     */
    protected $acceptanceTester;

    /*
     * конструктор
     */
    public function __construct(\AcceptanceTester $I)
    {
        $this->acceptanceTester = $I;
    }

}
