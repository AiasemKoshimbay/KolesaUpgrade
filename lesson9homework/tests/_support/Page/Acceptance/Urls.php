<?php
namespace Page\Acceptance;
/**
 * класс для страницы урлов и сообщении
 */
class Urls
{
    /**
     * переменная урла при посте
     */
    public static $urlPost = 'human';

    /**
     * переменная массива при успешном создании юзера
     */
    public static $successJsonPost = ['status' => 'ok'];

    /**
     * Переменная масива при успешном изменении данных
     */
    public static $successJsonUpdate = ['nModified' => '1'];

    /**
     * переменная урла при получении информации
     */
    public static $urlGet = 'people';

    /**
     * переменная массива при успешном удалении данных
     */
    public static $successJsonDelete = ['deletedCount' => '1'];

}
