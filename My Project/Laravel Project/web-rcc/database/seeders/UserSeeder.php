<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // DB::table('users')->insert([
        //     'name' => Str::random(10),
        //     'email' =>  'dzikal@gmail.com',
        //     'password' => Hash::make('password'),
        //     'role' => 'admin',
        //     'phone' => Str::random(10),
        //     'address_id' => 1,
        //     'organization' => Str::random(10),
        // ]);
        //
    }
}
