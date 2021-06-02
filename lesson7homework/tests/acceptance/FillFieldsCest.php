<?php
use Faker\Factory;
use Page\Acceptance\Fields;
use Page\Acceptance\PaymentMethodFields;
use Helper\CustomFakerProvider;

/**
    * Класс для заполпения полей с Faker данными
*/
class FillFieldsCest
{
   
    /**
     * тест на проверку заполнения полей с помощью фейкера
     * @group test2
     */
    public function checkFillFieldsWithFaker(\AcceptanceTester $I)
    {
        $faker = Factory::create('ru_RU');
        $faker ->addProvider(new CustomFakerProvider($faker));

        $firstname = $faker ->firstName;
        $lastname = $faker ->lastName; 
        $email = $faker ->email;
        $phoneNumber = $faker ->phoneNumber;
        $address = $faker ->address;
        $city = $faker ->city;
        $state = $faker ->region;
        $postal = $faker ->postcode;
        $creditcardnum = $I ->getFaker()-> getCreditCardNumber();
        $securitycode = random_int(100,999);


        $I ->amOnPage('');
        $I ->fillField(Fields::$firstNameField,$firstname);
        $I ->fillField(Fields::$lastNameField,$lastname);
        $I ->fillField(Fields::$emailField,$email);
        $I ->fillField(Fields::$phoneNumberField,$phoneNumber);
        $I ->fillField(Fields::$addressField,$address);
        $I ->fillField(Fields::$cityField, $city);
        $I ->fillField(Fields::$stateField,$state);
        $I ->fillField(Fields::$postalField,$postal);
        $I ->click(Fields::$creditRadioButton);

        $I ->waitForElementVisible(PaymentMethodFields::$paymentTable);
        $I ->fillField(PaymentMethodFields::$firstNameField,$firstname);
        $I ->fillField(PaymentMethodFields::$lastNameField,$lastname);
        $I ->fillField(PaymentMethodFields::$creditCardNumField,$creditcardnum);
        $I ->fillField(PaymentMethodFields::$securityCode,$securitycode);
        
        $I ->click(PaymentMethodFields::$expirationMonthSelect);
        $optionMonth = $I->grabMultiple(PaymentMethodFields::$optionMonth,'value');
        $I->selectOption(PaymentMethodFields::$expirationMonthSelect, $optionMonth[array_rand($optionMonth)]);
        $I->click(PaymentMethodFields::$expirationYearSelect);
        $optionYear = $I ->grabMultiple(PaymentMethodFields::$optionYear,'value');
        $I->selectOption(PaymentMethodFields::$expirationYearSelect,$optionYear[array_rand($optionYear)]);
        $I->fillField(PaymentMethodFields::$billAddress,$address);
        $I->fillField(PaymentMethodFields::$billCity,$city);
        $I->fillField(PaymentMethodFields::$billState,$state);
        $I->fillField(PaymentMethodFields::$zipcode,$postal);
        $I->click(PaymentMethodFields::$countySelect);
        $optionCountry = $I->grabMultiple(PaymentMethodFields::$optionCountry,'value');
        $I ->selectOption(PaymentMethodFields::$countySelect,$optionCountry[array_rand($optionCountry)]);
        
        $I ->click(Fields::$registerButton);
        $I ->waitForText('Good job');

    }
    
}
