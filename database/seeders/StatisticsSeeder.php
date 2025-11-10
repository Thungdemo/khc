<?php

namespace Database\Seeders;

use App\Models\Statistics;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class StatisticsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $startYear = 2020;
        $endYear = date('Y');
        $statistics = [];
        while ($startYear <= $endYear) 
        {
            for($i=1;$i<=12;$i++) 
            {
                $statistics[] = [
                    'year' => $startYear,
                    'month' => $i,
                    'filename' => 'dummy/dummy-pdf.pdf',
                    'created_at' => now(),
                    'updated_at' => now()
                ];
            }
            $startYear++;
        }
        Statistics::insert($statistics);
    }
}
