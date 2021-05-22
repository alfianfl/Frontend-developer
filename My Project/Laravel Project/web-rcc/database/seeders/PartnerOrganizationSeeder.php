<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class PartnerOrganizationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('partner_organizations')->insert([
            [
                'partner_name' => 'Institut Pertanian Bogor',
                'partner_picture' =>  'IPB.png',
                'address_organization' => 'Indonesia',
                'conference_id' => 1,
            ],
            [
                'partner_name' => 'Institut Teknologi Bandung (ITB)',
                'partner_picture' =>  'ITB.png',
                'address_organization' =>'Bandung, Indonesia',
                'conference_id' => 1,
            ],
            [
                'partner_name' => 'Universitas Pendidikan Indonesia',
                'partner_picture' =>  'UPI.png',
                'address_organization' => 'Indonesia',
                'conference_id' => 1,
            ],
            [
                'partner_name' => 'Universitas Sumatera Utara',
                'partner_picture' =>  'USU.png',
                'address_organization' => 'Indonesia',
                'conference_id' => 1,
            ],
            [
                'partner_name' => 'Universitas Indonesia',
                'partner_picture' =>  'UI.png',
                'address_organization' => 'Indonesia',
                'conference_id' => 1,
            ],
            [
                'partner_name' => 'Universitas Gajah Mada (UGM)',
                'partner_picture' =>  'UGM.png',
                'address_organization' => 'Yogyakarta, Indonesia',
                'conference_id' => 1,
            ],
            [
                'partner_name' => 'Institut Teknologi Sepuluh November (ITS)',
                'partner_picture' =>  'ITS.png',
                'address_organization' =>'Surabaya, Indonesia',
                'conference_id' => 1,
            ],
            [
                'partner_name' => 'Universitas Sultan Zainal Abidin',
                'partner_picture' =>  'UniversitasSultanZainalAbidin,Malaysia.png',
                'address_organization' => 'Malaysia',
                'conference_id' => 1,
            ],
            [
                'partner_name' => 'Universitas Teknologi Mara',
                'partner_picture' =>  'UniversitasTeknologiMara,Malaysia.png',
                'address_organization' => 'Malaysia',
                'conference_id' => 1,
            ],
            [
                'partner_name' => 'Visvesvaraya Technological University',
                'partner_picture' =>  'VisvesvarayaTechnologicalUniversity,India.png',
                'address_organization' => 'India',
                'conference_id' => 1,
            ],
        ]);
    }
}
