<?php

use Page\Acceptance\CategoryPage;
use Page\Acceptance\SearchPage;
use Page\Acceptance\UpdatePage;

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
        $updatePage = new UpdatePage($I);
        $I -> amOnPage(SearchPage::$URL);
        $searchPage -> clickCatolog();
        $updatePage -> checkGridElements()
                      -> clickListButton()
                      -> checkListLayout();

    }
}
