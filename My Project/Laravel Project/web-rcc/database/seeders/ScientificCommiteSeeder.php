<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class ScientificCommiteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('scientific_commites')->insert([
            [

                'name' => 'Prof. Dr. Indah Emilia Wijayanti, Universitas Gajah Mada (UGM), Yogyakarta, Indonesia',
                'conference_id' => 1,
            ],
            [
                'name' => 'Assoc. Prof. Dr. Adibah Shuib, Universiti Teknologi MARA (UiTM), Malaysia',
                'conference_id' => 1,
            ],
            [
                'name' => 'Assoc. Prof. Dr. Dr. Nurfadhlina Binti Abdul Halim, Universiti Sains Islam Malaysia, Negeri Sembilan, Malaysia',
                'conference_id' => 1,
            ],
            [
                'name' => 'Prof. Dr, Johnson Naibaho, Institut Teknologi Bandung, Bandung, Indonesia',
                'conference_id' => 1,
            ],
            [
                'name' => 'Prof. Dr. Sundarapandian Vaidyanathan, Vel Tech University, India',
                'conference_id' => 1,
            ],
            [
                'name' => 'Prof. Dr. Mustafa Mamat, Universiti Sultan Zainal Abidin, Terengganu, Malaysia',
                'conference_id' => 1,
            ],
            [
                'name' => 'Prof. Dr. Budi Nurani, Universitas Padjadjaran, Bandung, Indonesia',
                'conference_id' => 1,
            ],
            [
                'name' => 'Prof. Dr. Asep K. Supriatna, Universitas Padjadjaran, Bandung, Indonesia',
                'conference_id' => 1,
            ],
            [
                'name' => 'Prof. Herman Mawengkang, Universitas Sumatera Utara, Indonesia',
                'conference_id' => 1,
            ],
            [
                'name' => 'Prof. Dr. Marwan, Universitas Syiah Kuala, Indonesia',
                'conference_id' => 1,
            ],
            [
                'name' => 'Prof. Dr. Salmah, Universitas Gadjah Mada, Indonesia',
                'conference_id' => 1,
            ],
            [
                'name' => 'Prof. Dr. Toni Bachtiar, Institut Pertanian Bogor, Indonesia',
                'conference_id' => 1,
            ],
            [
                'name' => 'Prof. Dr.-Ing Soewarto Hadhienata, Universitas Pakuan, Indonesia',
                'conference_id' => 1,
            ],

        ]);
    }
}
