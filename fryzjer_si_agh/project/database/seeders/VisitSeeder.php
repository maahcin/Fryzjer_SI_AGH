<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VisitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('visits')->insert([
            'services_id' => 4,   //ADMIN
            'users_id' => 2,
            'start_datetime' => now(),
            'end_datetime' => now(),
            'client_name' => 'Cli Ent',
            'client_phone' => '123456789',
            'status' => 0,
        ]);
    }
}
