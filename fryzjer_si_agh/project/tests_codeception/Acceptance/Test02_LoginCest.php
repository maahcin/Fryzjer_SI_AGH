<?php

namespace TestsCodeception\Acceptance;

use TestsCodeception\Support\AcceptanceTester;

class Test02_LoginCest
{
    public function loginTest(AcceptanceTester $I): void
    {
        $I->wantTo('login with existing user');
        $I->amOnPage('/dashboard');
        $I->seeCurrentUrlEquals('/login');
        $I->fillField('email', 'storeman1@hairstyle.com');
        $I->fillField('password', 's');
        $I->click('Log in');
        $I->see("These credentials do not match our records.");
        $I->fillField('password', 'secret');
        $I->click('Log in');
        $I->seeCurrentUrlEquals('/dashboard');
        $I->see("Welcome to");
    }
}
