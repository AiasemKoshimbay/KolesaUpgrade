<?php
namespace Page\Acceptance;

/**http://automationpractice.com/index.php
 * Класс страницы категории
 */
class UpdatePage
{
    /**
     * урл страницы категории
     */
    public static $URL = '?id_category=11&controller=category';

    /**
     * селектор грида
     */
    public static $grid = '#grid';

    /**
     * селектор блока композиции для скрола
     */
    public static  $compostions ='#ul_layered_id_feature_5';

    /**
     * селектор карточек ввиде грида
     */
    public static $gridTable = '#center_column > ul.row.grid';

    /**
     * селектор карточек в виде листа
     */
    public static $listTable = '#center_column > ul.row.list';

    /**
     * селектор кнопки лист
     */
    public static $listI = '#list > a > i';

    /**
     * селектор описание карточки при листе
     */
    public static $descriptCard = '//*[@id="center_column"]//li[1]//div[2]/p';

    /** Объект Тестера
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
     * проверка карточек ввиде таблицы грид
     */
    public function checkGridElements()
    {
        $this -> acceptanceTester -> waitForElement(self::$grid);
        $this -> acceptanceTester -> ScrollTo(self::$compostions);
        $this -> acceptanceTester -> waitForElement(self::$gridTable);
        
        return $this;
    }

    /**
     * нажимает на кнопку List
     */
    public function clickListButton()
    {
        $this -> acceptanceTester -> click(self::$listI);
        return $this;
    }

    /**
     * проверка элементов карточки в виде листа
     */
    public function checkListLayout()
    {
        $this ->acceptanceTester -> waitForElement(self::$listTable);
        $this ->acceptanceTester -> waitForElement(self::$descriptCard);
    }


}
