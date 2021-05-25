<?php

class QuickViewCest
{
    /**
     * проверка открытия карточки Blouse
     */
    public function checkCardByQuickView(AcceptanceTester $I)
    {
        $cardXpath = '//*[@id="homefeatured"]/li[2]';
        $quickViewCSS = '#homefeatured > li:nth-child(2) > div > div.left-block > div > a.quick-view >span';
        $iFrameBoxXpath = '//*[@class="fancybox-iframe"]';

        $I->maximizeWindow();
        $I ->amOnPage('');
        $I ->waitForElement('//*[@id="homefeatured"]/li[2]');
        $I ->moveMouseOver('//*[@id="homefeatured"]/li[2]');
        $I ->waitForElement('#homefeatured > li:nth-child(2) > div > div.left-block > div > a.quick-view > span');
        $I ->click('#homefeatured > li:nth-child(2) > div > div.left-block > div > a.quick-view > span');
        $I ->wait(5);
        $I ->switchToIFrame('//*[@class="fancybox-iframe"]');
        $I->see('Blouse');
        
    }
}
