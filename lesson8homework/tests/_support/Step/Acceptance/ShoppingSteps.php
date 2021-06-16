<?php
namespace Step\Acceptance;

use Page\Acceptance\MainPage;
use Page\Acceptance\MyAccount;
use Page\Acceptance\MyWishListPage;

/**
 * класс для шагов покупок
 */
class ShoppingSteps extends \AcceptanceTester
{
    /**
     * константа для количество товаров 
     */
    public const PRODUCTS_NUMBER = 2;
    /**
     * функция для добавления карточек в избранное
     */
    public function addCardsToWishList()
    {
        $count = 0;
        for ($i=1; $i <= self::PRODUCTS_NUMBER; $i++) 
        {  
            $I = $this;
            $I ->moveMouseOver(sprintf(MainPage::$productCard,$i));
            $I ->waitForElementClickable(sprintf(MainPage::$quickView,$i));
            $I ->click(sprintf(MainPage::$quickView,$i));
            $I ->switchToFrame(MainPage::$iframeCard);
            $I ->waitForElementVisible(MainPage::$imageCard);
            $I ->click(MainPage::$AddWishListButton);
            $I ->waitForText(MainPage::$successMessage);
            $I ->waitForElement(MainPage::$closeButton);
            $I ->click(MainPage::$closeButton);
            $I ->switchToFrame();
            $I ->waitForElementVisible(MainPage::$iframeCard);
            $I ->click(MainPage::$closeButton);
            $count++;
        }
        return $count;
        
    }
    /**
     * функция перехода на страницу мои избранные
     */
    public function gotoMyWishListPage()
    {
        $I = $this;
        $I ->scrollTo(MainPage::$accountButton);
        $I ->click(MainPage::$accountButton);
        $I ->seeInCurrentUrl(MyAccount::$URL);
        $I ->click(MyAccount::$myWishLists);
        $I ->seeInCurrentUrl(MyWishListPage::$URL);
    }

    /**
     * функция для удаления товаров с избранных
     */
    public function deleteItemsFromWishList()
    {
        $I = $this;
        $I ->amOnPage(MyWishListPage::$URL);
        $I ->waitForElementClickable(MyWishListPage::$deleteWishListIcon);
        $I ->click(MyWishListPage::$deleteWishListIcon);
        $I ->acceptPopup();
        
    }
}