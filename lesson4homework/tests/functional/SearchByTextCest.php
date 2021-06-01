<?php

class SearchByTextCest
{
 
    /**
     * Проверить поиск по тексту и количество найденных карточек
     */
    public function checkSearchCardByText(FunctionalTester $I)
    {
       $searchCSS = '#search_query_top';
       $searchButtonXpath = '//*[@id="searchbox"]/button';
       $cardCSS = '.product-container';

       $I ->amOnPage('');
       $I ->seeElement('#search_query_top');
       $I ->fillField('#search_query_top','Printed dress');
       $I ->click('//*[@id="searchbox"]/button');
       $I ->seeNumberOfElements('.product-container',5);

    }
}
