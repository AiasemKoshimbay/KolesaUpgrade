<?php

use Page\Acceptance\Urls;

/**
 * класс для работы с апи
 */
class UsersCest
{
    /**
     * переменная для изменении работы
     */
    public static $newjob ='QA enginer';
    /**
     * проверяет создание юзера  
     * 
     */
    public function checkCreateUser(FunctionalTester $I)
    {
        $userData = [
            'email' => $I ->getFaker()->email(),
            'name'  => $I ->getFaker()->name(),
            'owner' => 'aiasem_k'.$I ->getFaker() ->firstName(),
            'job'   => $I ->getFaker()->company()
        ];
        $I ->haveHttpHeader('Content-Type', 'application/json');
        $I ->sendPost(Urls::$urlPost, $userData);
        $I ->seeResponseCodeIsSuccessful();
        $I ->seeResponseContainsJson(Urls::$successJsonPost);

        return $userData;
        
    }
    /**
     * проверяет изменение данных юзера
     * 
     * @group test1
     */
    public  function updateUserData(\FunctionalTester $I)
    {
        $userData = $this->checkCreateUser($I);
        $user_id = $I->grabDataFromResponseByJsonPath('_id');
        $I ->haveHttpHeader('Content-Type', 'application/json');
        $I ->sendPut(sprintf('human?_id=%s', $user_id[0]),['job'=>self::$newjob]);
        $I ->seeResponseContainsJson(Urls::$successJsonUpdate);

        $I ->sendGet(sprintf(Urls::$urlGet),$userData);
        $I ->seeResponseContainsJson(['job'=> self::$newjob]);
    }
    /**
     * проверяет удаление данных
     * 
     * @group test2
     */
    public  function deleteUserData(FunctionalTester $I)
    {   
        $userData = $this->checkCreateUser($I);
        
        $user_id = $I->grabDataFromResponseByJsonPath('_id');
        $I ->haveHttpHeader('Content-Type', 'application/json');
        $I ->sendDelete(sprintf('human?_id=%s',$user_id[0]));
        $I ->seeResponseContainsJson(Urls::$successJsonDelete);
        $I ->sendGet(sprintf(Urls::$urlGet),$userData);
        $I->seeResponseIsJson();

    }

}
