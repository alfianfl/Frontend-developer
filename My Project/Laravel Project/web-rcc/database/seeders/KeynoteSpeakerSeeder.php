<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class KeynoteSpeakerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('keynote_speakers')->insert([
            [

                'name' => 'Prof. Dr. Sundarapandian Vaidyanathan',
                'institution' => 'Vel Tech University, Avadi, Chennai-600 062, Tamil Nadu, INDIA',
                'conference_id' => 1,
                'image'  => 'ProfSundarapandian.png',
            ],
            [

                'name' => 'Assoc. Prof. Ts. Dr. Adibah Shuib, FI MA',
                'institution' => 'Universiti Teknologi MARA (UiTM), Malaysia',
                'conference_id' => 1,
                'image'  => 'Adibah.png',
            ],
            [

                'name' => 'Assoc. Prof. Dr. Albert C. J. Luo',
                'institution' => 'Southern Illinois University Edwardsville, Illinois, Amerika Serikat',
                'conference_id' => 1,
                'image'  => 'Albert.png',
            ],
            [

                'name' => 'Prof. Dr. Sudradjat Supian',
                'institution' => 'Padjadjaran University, Jatinangor, West Java, Indonesia',
                'conference_id' => 1,
                'image'  => 'Sudradjat.png',
            ],



        ]);
    }
}
