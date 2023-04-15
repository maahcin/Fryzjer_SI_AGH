<?php

namespace TestsCodeception\Acceptance;

use TestsCodeception\Support\AcceptanceTester;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class Test03_Receptionist_SeeHairstylerServicesCest
{
    public function receptionistTest(AcceptanceTester $I): void
    {
        $I->wantTo('see avaliable services of hairstylers');

        $I->amOnPage('/login');

        $I->seeCurrentUrlEquals('/login');

        $I->fillField('email', 'receptionist@hairstyle.com');
        $I->fillField('password', 'secret');

        $I->click('Log in');

        $I->seeCurrentUrlEquals('/dashboard');

        $I->click('Employees');

        $I->seeCurrentUrlEquals('/employees');

        $I->see('hairdresser1');

        $I->click('Details');

        $hairdresserID = $I->grabColumnFromDatabase('users', 'id', ['name' => 'hairdresser1',
            'type' => 2])[0];

        $specialities = $I->grabColumnFromDatabase('users', 'speciality', ['id' => $hairdresserID])[0];
        $speciality = explode(",", $specialities);

        foreach ($speciality as $s) {
            $I->see($s);
        }

    }
}
