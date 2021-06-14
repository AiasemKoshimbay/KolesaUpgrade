<?php
use Faker\Factory;
use Page\Acceptance\ContentPage;

/**
 * класс для работы с базами данными
 */
class UsersCest
{
    public const NUMBERSOFUSERS = 10;

    public const OWNER = 'Aiasem_k';
    /**
     * проверка создания юзера в базе
     */
    public function createUser(\AcceptanceTester $I)
    {
        $faker = Factory::create("en_EN");
        $this->userData = [
            "job"=> $faker->jobTitle(),
            "superhero"=> $faker->boolean(),
            "skill"=> $faker->word(),
            "email"=> $faker->email(),
            "name"=> $faker->name(),
            "DOB"=> $faker->date("Y-m-d"),
            "avatar"=> $faker->imageUrl(),
            "canbeKilledBySnap" => $faker->boolean(),
            "created_at" => $faker->date("Y-m-d"),
            "owner"=> self::OWNER,
        ]; 
    }
    /**
     * проверка создания юзера в базе
     * @group test1
     */
    public function checkUserCreateTest(AcceptanceTester $I)
    {
        for($i = 0; $i< self::NUMBERSOFUSERS; $i++){
            $this ->createUser($I);
            $I->haveInCollection('people', $this ->userData);

            $user = $I->grabFromCollection('people', array('owner' => $this ->userData['owner']));

            $I->amOnPage('people?owner='.$this ->userData['owner']);
            $I->waitForElementVisible(ContentPage::$blockCard);
            $I->see($user['name']);
        }
        $I ->amOnPage(sprintf('/?owner=%s',$this->userData['owner']));
        $I->waitForElementVisible(ContentPage::$blockCard);
        $I->seeNumberOfElements(ContentPage::$blockCard, self::NUMBERSOFUSERS);
        $I->click(ContentPage::$snap);
        $count = $I->grabCollectionCount('people', ['owner' => $this->userData['owner'],'canbeKilledBySnap'=> true]);
        while ($count <= 0) {
            $user = $I->grabFromCollection('people', ['owner' => $this->userData['owner'],'canbeKilledBySnap'=> true]);
            $I ->sendDelete(sprintf('/human?_id=%s',$user['_id']),$this->userData);
            $count --;
        }
        $I->dontSeeInCollection('people', ['owner' => $this->userData['owner'],'canbeKilledBySnap'=> true]);
        $user = $I->grabCollectionCount('people', array('canBeKilledBySnap' => true,'owner' => $this ->userData['owner']));
        $I->seeNumberOfElements(ContentPage::$blockCard, $user);
    }
    /**
     * Проверяет удаления юзера с базы данных
     * @group test2
     */
    public  function checkUserDelete(AcceptanceTester  $I)
    {
        $I ->amOnPage(sprintf('/?owner=%s',$this->userData['owner']));
        $I->waitForElementVisible(ContentPage::$blockCard);
        $I->seeNumberOfElements(ContentPage::$blockCard, self::NUMBERSOFUSERS);
        $I->click(ContentPage::$snap);

        $count = $I->grabCollectionCount('people', ['owner' => $this->userData['owner'],'canbeKilledBySnap'=> true]);

        while ($count <= 0) {

            $user = $I->grabFromCollection('people', ['owner' => $this->userData['owner'],'canbeKilledBySnap'=> true]);

            $I ->sendDelete(sprintf('/human?_id=%s',$user['_id']),$this->userData);
            $count --;
        }
        $I->dontSeeInCollection('people', ['owner' => $this->userData['owner'],'canbeKilledBySnap'=> true]);

        $user = $I->grabCollectionCount('people', array('canBeKilledBySnap' => true,'owner' => $this ->userData['owner']));
        
        $I->seeNumberOfElements(ContentPage::$blockCard, $user);
    }

}
