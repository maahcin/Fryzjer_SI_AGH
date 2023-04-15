<?php

namespace TestsCodeception\Acceptance;

use TestsCodeception\Support\AcceptanceTester;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class Test05_Admin_DeliveryReportCest
{
    public function adminTest(AcceptanceTester $I): void
    {
        $I->wantTo('see a report as an admin');

        $I->amOnPage('/login');

        $I->seeCurrentUrlEquals('/login');

        $I->fillField('email', 'admin@hairstyle.com');
        $I->fillField('password', 'secret');

        $I->click('Log in');

        $I->seeCurrentUrlEquals('/dashboard');

        $I->click('Watch Delivery Reports');

        $I->seeCurrentUrlEquals('/delraport');

        $ids = $I->grabColumnFromDatabase('deliveries', 'id');
        $prices = $I->grabColumnFromDatabase('deliveries', 'sum');

        foreach ($ids as $id) {
            $I->see('Report from delivery, id number: '.$id);
            $productsID = $I->grabColumnFromDatabase('delivery__products', 'id_product', ['id_delivery' => $id]);
            foreach ($productsID as $pID) {
                $product = $I->grabColumnFromDatabase('products', 'name', ['id' => $pID])[0];
                $amount = $I->grabColumnFromDatabase('delivery__products', 'quantity', ['id_delivery' => $id, 'id_product' => $pID])[0];
                $cost = $I->grabColumnFromDatabase('products', 'cost', ['id' => $pID])[0];
                $I->see($product.', amount: '.$amount.', cost of single item: '.$cost);
            }
        }
        foreach ($prices as $price) {
            $I->see('Price: '.$price);
        }
    }
}
