<?php
namespace Helper;
use Faker\Factory;

/**
 * Родительный класс для Faker
 */
class BaseHelper extends \Codeception\Module
{
    /**
     * функция для получения фейкера
     */
    public function getFaker($locale='ru_RU')
    {   
        
        $faker = Factory::create($locale);
        $faker ->addProvider(new CustomFakerProvider($faker));

        return $faker;

    }

}
