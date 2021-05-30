<?php

use Page\Acceptance\LoginPage;

/**
 * Класс для проверки авторизации
 */
class LoginCest
{

    /**
     * проверяет авторизацию с заблокированным юзером
     */
    public function checkLoginWithBlockedUser(AcceptanceTester $I)
    {
        $loginPage = new LoginPage($I);
        $I ->amOnPage(LoginPage::$URL);
        $loginPage -> fillUserPassFields()
            -> clickLoginButton()
            -> catchErrorBlock()
            -> closeErrorAndCheck();
    }
}
