<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => 'admin',   //ADMIN
            'email' => 'admin@hairstyle.com',
            'password' => bcrypt('secret'),
            'type' => 1,
            'phone' => '987654321',
        ]);
        DB::table('users')->insert([   // FRYZJER
            'name' => 'hairdresser1',
            'email' => 'hairdresser1@hairstyle.com',
            'password' => bcrypt('secret'),
            'type' => 2,
            'phone' => '123456789',
        ]);
        DB::table('users')->insert([  //KSIĘGOWA
            'name' => 'accountant',
            'email' => 'accountant@hairstyle.com',
            'password' => bcrypt('secret'),
            'type' => 3,
            'phone' => '123123123',
        ]);
        DB::table('users')->insert([  //RECEPCJONISTKA
            'name' => 'receptionist',
            'email' => 'receptionist@hairstyle.com',
            'password' => bcrypt('secret'),
            'type' => 4,
            'phone' => '321321321',
        ]);
        DB::table('users')->insert([  //MAGAZYNIER
            'name' => 'storeman1',
            'email' => 'storeman1@hairstyle.com',
            'password' => bcrypt('secret'),
            'type' => 5,
            'phone' => '999123999',
        ]);
    }
}
