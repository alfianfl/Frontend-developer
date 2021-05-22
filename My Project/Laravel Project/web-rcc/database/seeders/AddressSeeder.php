<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class AddressSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // DB::table('address')->insert([
        //     'city' => Str::random(10),
        //     'state' =>  Str::random(10),
        //     'country' => Str::random(10),
        //     'postal_code' => Str::random(10),
        //     'address' => Str::random(10),
        // ]);
    }
}
