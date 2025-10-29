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
            ['id'=>'general','name'=>'General Notice','ordering'=>1],
            ['id'=>'transfer','name'=>'Transfer & Posting','ordering'=>2],
            ['id'=>'recruitment','name'=>'Recruitment','ordering'=>3],
            ['id'=>'tender','name'=>'Tender Notice','ordering'=>4],
            ['id'=>'misc','name'=>'Miscellaneous','ordering'=>5],
        ]);
    }
}
