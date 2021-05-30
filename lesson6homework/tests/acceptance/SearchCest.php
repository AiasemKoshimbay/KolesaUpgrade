<?php

use Page\Acceptance\CategoryPage;
use Page\Acceptance\SearchPage;

/**
 * Класс для поиска карточек и смены раскладки при поиске
 */
class SearchCest
{
    /**
     * Проверка смены расскладки при поиске 
     */
    public function checkLayoutCardsBySearch(AcceptanceTester $I)
    {
        $searchPage = new SearchPage($I);
        $categoryPage = new CategoryPage($I);
        $I -> amOnPage(SearchPage::$URL);
        $searchPage -> clickCatolog();
        $categoryPage -> checkGridElements()
                      -> clickListButton()
                      -> checkListLayout();

    }
}
