<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class TemplateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('templates')->insert([
            [
                'title' => 'Abstract Template',
                'file_name' =>  'AbstractTemplateforICoCOME2021.docx',
                'conference_id' => 1,
            ],
            [
                'title' => 'Full Paper Template',
                'file_name' =>  'FullPaperTemplateforICoCOME2021.docx',
                'conference_id' => 1,
            ],
        ]);
    }
}