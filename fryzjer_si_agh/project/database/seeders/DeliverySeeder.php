<?php

namespace Database\Seeders;

use DateTime;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DeliverySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('deliveries')->insert([
            'date' => new DateTime('2016/01/01'),
            'sum' => 140.00
        ]);
        DB::table('delivery__products')->insert([
            'id_delivery' => '1',
            'id_product' => '3',
            'quantity' => 6,
        ]);
        DB::table('delivery__products')->insert([
            'id_delivery' => '1',
            'id_product' => '2',
            'quantity' => 1,
        ]);
    }
}
