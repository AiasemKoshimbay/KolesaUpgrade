<?php
namespace Page\Acceptance;

/**http://automationpractice.com/index.php
 * Класс страницы  для поиска
 */
class SearchPage
{
    /**
     * урл главной страницы
     */
    public static $URL = '';

     /**
     * cелектор католога платьи
     */
    public static $categoryDresses = '#block_top_menu > ul > li:nth-child(2)';

    /**
     * cелектор под категории летние платьи
     */
    public static $subcategSummer = '#block_top_menu > ul > li:nth-child(2) > ul > li:nth-child(3)';

   
    /** Обьект тестера
     * @var \AcceptanceTester;
     */
    protected $acceptanceTester;

    /**
     *  конструктор
     */
    public function __construct(\AcceptanceTester $I)
    {
        $this->acceptanceTester = $I;
    }

    /**
     * Выбирает в каталоге dresses -> Summer Dresses
     */
    public function clickCatolog()
    {
        $this -> acceptanceTester -> moveMouseOver(self::$categoryDresses);
        $this -> acceptanceTester -> waitForElementVisible(self::$subcategSummer);
        $this -> acceptanceTester -> click(self::$subcategSummer);

    }

}
