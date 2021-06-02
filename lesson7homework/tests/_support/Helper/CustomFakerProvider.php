<?php
namespace Helper;
use Faker\Provider\Base;

/**
 * Класс для кастомного фейкера для кредитной карточки
 */
class CustomFakerProvider extends Base
{
    /**
     * массив с фейковыми номерами карточки
     */
    protected $creditNumber =
    [
        '4042427794685633',
        '4042427799371254',
        '2200563590123456',
        '4276567722781024',
        '3713310745661009'
    ];
    /**
     * функция для получения рандомного номера кредитной карты
     */
    public  function getCreditCardNumber()
    {
       return sprintf(
           '%d',
           $this->creditNumber[array_rand($this->creditNumber)]
       );
       
    }
}
