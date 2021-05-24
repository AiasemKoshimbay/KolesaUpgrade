<?php

class QuickViewCest
{
   
    public function checkCardByQuickView(AcceptanceTester $I)
    {
        $I->maximizeWindow();
        $I ->amOnPage('');
        $I ->waitForElement('#homefeatured > li:nth-child(2) > div > div.left-block > div');
        $I ->moveMouseOver('#homefeatured > li:nth-child(2) > div > div.left-block > div');
        $I ->waitForElement('#homefeatured > li:nth-child(2) > div > div.left-block > div > a.quick-view > span');
        $I ->click('#homefeatured > li:nth-child(2) > div > div.left-block > div > a.quick-view > span');
        $I ->wait(5);
        $I ->switchToIFrame('.fancybox-iframe');
        $I->see('Blouse');
        
    }
}
