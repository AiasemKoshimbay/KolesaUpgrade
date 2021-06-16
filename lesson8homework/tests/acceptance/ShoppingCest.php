<?php

use Page\Acceptance\LoginPage;
use Page\Acceptance\MainPage;
use Page\Acceptance\MyAccount;
use Page\Acceptance\MyWishListPage;

/**
 * класс для добавления товаров 
 */
class ShoppingCest
{
    
    /**
     * функция логина юзера перед каждым тестом
     */
    public function _before(AcceptanceTester $I)
    {
        $loginPage = new LoginPage($I); 
        $I->amOnPage(MainPage::$URL);
        $I->click(MainPage::$signInButton);
        $I->seeInCurrentUrl(LoginPage::$URL);
        $loginPage ->SignIn();
        $I->seeInCurrentUrl(MyAccount::$URL);
        $I->waitForText('MY ACCOUNT',5,MyAccount::$titleHeader);
    }
    /**
     * функция удаление товаров из избранных и логаут юзера после  каждого теста
     */
    public  function _after(\Step\Acceptance\ShoppingSteps $I)
    {
       $I ->deleteItemsFromWishList();
       $I ->click(MainPage::$logOutButton);
       $I ->waitForElementVisible(MainPage::$signInButton);
        
    }

    /**
     * тест проверяет добавление товаров в раздел избранное
     */
    public function checkWishListCard(\Step\Acceptance\ShoppingSteps $I)
    {
        $I ->amOnPage(MainPage::$URL);
        $I ->scrollTo(MainPage::$firstProductCard);

        $CountItems = $I ->addCardsToWishList();
        $I ->gotoMyWishListPage();

        $totalQuantity = intval($I->grabTextFrom(MyWishListPage::$quantityColumn));
        $I ->assertEquals($totalQuantity,$CountItems,"check that totalQuantity is correct");

    }
    
}
