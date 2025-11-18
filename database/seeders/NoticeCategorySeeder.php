<?php

namespace Database\Seeders;

use App\Models\NoticeCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NoticeCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        NoticeCategory::insert([
            ['id'=>1,'name'=>'General Notice','ordering'=>1,'parent_id'=>null],
            ['id'=>2,'name'=>'Transfer & Posting','ordering'=>2,'parent_id'=>null],
            ['id'=>3,'name'=>'Recruitment','ordering'=>3,'parent_id'=>null],
            ['id'=>4,'name'=>'Tender Notice','ordering'=>4,'parent_id'=>null],
            ['id'=>5,'name'=>'Nagaland District Judiciary','ordering'=>5,'parent_id'=>null],
            ['id'=>6,'name'=>'Miscellaneous','ordering'=>6,'parent_id'=>null],

            ['id'=>7,'name'=>'District Court','ordering'=>null,'parent_id'=>3],
            ['id'=>8,'name'=>'High Court','ordering'=>null,'parent_id'=>3],
        ]);
    }
}
