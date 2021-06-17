<?php
namespace Page\Acceptance;
/**
 * страница для сгенированных данных
 */
class ContentPage
{
    /**
     * урл для получения информации
     */
    public static $getUrl = 'http://api.izze.xyz/test/people';
    /**
     * селектор кнопки снап
     */
    public static $snap = '//*[@id="snap"]';
    
    /**
     *  Селектр для блока карточки пользователья
     */
    public static $blockCard = ".user-card";

}
