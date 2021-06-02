<?php
namespace Page\Acceptance;
/**
 * Класс для главной страницы 
 */
class MainPage
{
    /**
     * локатор для подзаголовка
     */
    public static $navbarLinks = '#navbar-links';

    /**
     * селектор категории подзаголовка
     */
    public static $categoryLink = '//*[@id="navbar-links"]/li[%d]';
    
}
