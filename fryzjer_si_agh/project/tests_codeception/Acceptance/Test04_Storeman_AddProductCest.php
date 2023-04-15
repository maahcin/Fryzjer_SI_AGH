<?php

namespace TestsCodeception\Acceptance;

use TestsCodeception\Support\AcceptanceTester;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class Test04_Storeman_AddProductCest
{
    public function storesmanTest(AcceptanceTester $I): void
    {
        $I->wantTo('add a new product as a storeman');

        $I->amOnPage('/login');

        $I->seeCurrentUrlEquals('/login');

        $I->fillField('email', 'storeman1@hairstyle.com');
        $I->fillField('password', 'secret');

        $I->click('Log in');

        $I->seeCurrentUrlEquals('/dashboard');

        $I->click('Products');

        $I->seeCurrentUrlEquals('/products');

        $I->click('Add new product');
        $I->seeCurrentUrlEquals('/products/create');

        $name = 'new product';
        $cost = 50;

        $I->fillField('name', $name);
        $I->fillField('cost', $cost);

        $I->see('Create');

        $I->dontSeeInDatabase('products', ['name' => $name,
            'cost' => $cost]);

        $I->click('Create');

        $I->seeInDatabase('products', ['name' => $name,
            'cost' => $cost]);


        $I->see($name);
        $I->see($cost);
    }
}
