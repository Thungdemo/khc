<?php

namespace Database\Seeders;

use App\Models\FormDownload;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class FormDownloadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        FormDownload::factory()->count(20)->create();
    }
}
