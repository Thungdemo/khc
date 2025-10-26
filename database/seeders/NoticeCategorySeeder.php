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
            ['id'=>'general','name'=>'General Notice'],
            ['id'=>'transfer','name'=>'Transfer & Posting'],
            ['id'=>'recruitment','name'=>'Recruitment'],
            ['id'=>'tender','name'=>'Tender Notice'],
            ['id'=>'misc','name'=>'Miscellaneous'],
        ]);
    }
}
