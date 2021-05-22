<?php

namespace Database\Seeders;

use Faker\Provider\ar_JO\Text;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;


class ConferenceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('conferences')->insert([
            'conference_title' => 'INTERNATIONAL CONFERENCE ON CONTROL, OPTIMIZATION AND MATHEMATICAL ENGINEERING 2021
            (ICoCOME 2021)
            ',
            'conference_theme' => 'Innovation through control, optimization and engineering mathematics for economic revival post-pandemic Covid-19',
            'conference_place' => 'Universitas Padjadjaran, Bandung, Indonesia, November 17-18, 2021',
            'conference_about' => 'International Conference on Control, Optimization and Mathematical Engineering 2022 (ICoCOME 2021) is an excellent communication forum for discussion and exchange of ideas for researchers and practitioners in the field of control and optimization from around the world. This conference was organized by Indonesian Mathematical Society (IndoMS) in collaboration with Universitas Padjadjaran (Unpad) and Indonesian Operations Research Association (IORA), and was supported by several Universities in the World, Research Collaborations Community (RCC), and several Industrial Institutions.

            ',
            'conference_scope' => 'The conference covers areas such as Control and Optimization, Global Optimization, Shape Optimization, Optimization Methods in Inverse and Identification Problems, Intelligent and Fuzzy Control, Numerical Methods of Optimal Control, Applications Networks and Telecommunication Systems, Industrial Control Engineering, Oil Industry, Economics, Mathematical Engineering, and other.',
            'status' => 'on',
        ]);
        //
    }
}
