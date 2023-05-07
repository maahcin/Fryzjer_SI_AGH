<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('services')->insert([
            'name' => 'Strzyzenie meskie',
            'est_time_min' => 30,
            'cost' => 50.00,
        ]);
        DB::table('services')->insert([
            'name' => 'Strzyzenie damskie krotkie',
            'est_time_min' => 60,
            'cost' => 80.00,
        ]);
        DB::table('services')->insert([
            'name' => 'Strzyzenie damskie dlugie',
            'est_time_min' => 60,
            'cost' => 90.00,
        ]);
        DB::table('services')->insert([
            'name' => 'Strzyzenie meskie + broda',
            'est_time_min' => 45,
            'cost' => 65.00,
        ]);
        DB::table('services')->insert([
            'name' => 'Koloryzacja',
            'est_time_min' => 120,
            'cost' => 200.00,
        ]);
        DB::table('services')->insert([
            'name' => 'Koloryzacja + strzyzenie',   //ADMIN
            'est_time_min' => 120,
            'cost' => 240.00,
        ]);
    }
}
