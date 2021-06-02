<?php

use Codeception\Example;
use Page\Acceptance\MainPage;



/**
 * Класс для рандомного выбора категории подзаголовка
 */
class ChooseCategoryCest
{
    /**
     * Переменная двухмерного массива с данными для дата провайдера
     */
    protected  $randomness = 
    [
        ['childNum' => '2', 'header' => 'Разработка', 'url' =>'flows/develop/'],
        ['childNum' => '3', 'header' => 'Администрирование', 'url' =>'flows/admin/'],
        ['childNum' => '4', 'header' => 'Дизайн', 'url' =>'flows/design/'],
        ['childNum' => '5', 'header' => 'Менеджмент', 'url' =>'flows/management/'],
        ['childNum' => '6', 'header' => 'Маркетинг', 'url' => 'flows/marketing/'],
        ['childNum' => '7', 'header' => 'Научпоп', 'url' => 'flows/popsci/']
    ];
    
    /**
     * Тест выполняет для проверки выбора категории подзаголовка и урла страницы
     * @group test
     * @param Example $data
     * @dataProvider getCategory
     */
    public function chooseRandomCategory(AcceptanceTester $I, Example $data)
    {
        
        $I ->amOnPage('');
        $I ->waitForElementVisible(MainPage::$navbarLinks);
        $I ->click(sprintf(MainPage::$categoryLink,$data['childNum']));
        $I ->seeInTitle($data['header']);
        $I ->seeInCurrentUrl($data['url']);
        
    }
    /**
     * функция возвращающая  массив с рандомнами категориями сабмассива
     */
    protected function getCategory()
    {  
        $rand_keys = array_rand($this->randomness, 2);
        return [
            $this->randomness[$rand_keys[0]],
            $this->randomness[$rand_keys[1]]
        ];
    }
}
