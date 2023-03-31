<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            'name' => 'Farba blond',
            'cost' => 20.00,
        ]);
        DB::table('products')->insert([
            'name' => 'Farba czarna',
            'cost' => 20.00,
        ]);
        DB::table('products')->insert([
            'name' => 'Farba brąz',
            'cost' => 20.00,
        ]);
        DB::table('products')->insert([
            'name' => 'Farba ruda',
            'cost' => 20.00,
        ]);
        DB::table('products')->insert([
            'name' => 'Odżywka',
            'cost' => 50.00,
        ]);
        DB::table('products')->insert([
            'name' => 'Szampon',
            'cost' => 35.00,
        ]);
        DB::table('products')->insert([
            'name' => 'Rozjaśniacz',
            'cost' => 100.00,
        ]);
        DB::table('products')->insert([
            'name' => 'Spray do włosów',
            'cost' => 30.00,
        ]);
        DB::table('products')->insert([
            'name' => 'Pasta do włosów',
            'cost' => 55.00,
        ]);
        DB::table('products')->insert([
            'name' => 'Woda 500ml',
            'cost' => 5.00,
        ]);
    }
}
