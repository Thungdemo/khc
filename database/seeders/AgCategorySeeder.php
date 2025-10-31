<?php

namespace Database\Seeders;

use App\Models\AgCategory;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AgCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        AgCategory::insert([
            ['id'=>1,'name'=>'Advocate General'],
            ['id'=>2,'name'=>'Additional Advocate General'],
        ]);
    }
}
