<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'email' =>  'carmelo.ve@gmail.com',
            'password' => Hash::make('123456'),
            'name' => "Carmelo Fallone",
            'phone' => '+58 412-8750490',
            'number_personal_document' => 12345678,
            'date_birth' => '1993-11-05 01:00:00',
            'city_code' => 8001,
            'role' => 'admin'
        ]);
    }
}
