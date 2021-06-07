<?php
namespace Page\Acceptance;
/**
 * класс для страницы избранных
 */
class MyWishListPage
{
    /**
     * урл страницы избранных
     */
    public static $URL = 'index.php?fc=module&module=blockwishlist&controller=mywishlist';

    /**
     * селектор количество товаров в таблице избранных
     */
    public static $quantityColumn = 'td.bold.align_center';

    /**
     * селектор иконки удаления в таблице избранных
     */
    public static $deleteWishListIcon = ' td.wishlist_delete > a > i';

    
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
