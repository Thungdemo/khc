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
            ['id'=>1,'name'=>'General Notice','ordering'=>1],
            ['id'=>2,'name'=>'Transfer & Posting','ordering'=>2],
            ['id'=>3,'name'=>'Recruitment','ordering'=>3],
            ['id'=>4,'name'=>'Tender Notice','ordering'=>4],
            ['id'=>5,'name'=>'Nagaland District Judiciary','ordering'=>5],
            ['id'=>6,'name'=>'Miscellaneous','ordering'=>6],
        ]);
    }
}
