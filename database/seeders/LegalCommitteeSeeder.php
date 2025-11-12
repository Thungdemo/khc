<?php

namespace Database\Seeders;

use App\Models\LegalCommittee;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class LegalCommitteeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        LegalCommittee::factory(5)->create();
    }
}
