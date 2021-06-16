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
    public function getFaker($locale='en_EN')
    {   
        
        $faker = Factory::create($locale);
        return $faker;

    }
}
