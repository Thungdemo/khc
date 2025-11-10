<?php

namespace Database\Seeders;

use App\Models\Calendar;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CalendarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Calendar::insert([
            ['title' => 'Winter Vacation', 'start_date' => '2025-01-01', 'end_date' => '2025-01-15'],
            ['title' => 'Republic Day', 'start_date' => '2025-01-26', 'end_date' => '2025-01-26'],
            ['title' => 'Maha Shivratri', 'start_date' => '2025-02-26', 'end_date' => '2025-02-26'],
            ['title' => 'Holi', 'start_date' => '2025-03-14', 'end_date' => '2025-03-14'],
            ['title' => 'Id-ul-Fitre', 'start_date' => '2025-03-31', 'end_date' => '2025-03-31'],
            ['title' => 'Good Friday / Easter Sunday', 'start_date' => '2025-04-18', 'end_date' => '2025-04-21'],
            ['title' => 'Buddha Purnima', 'start_date' => '2025-05-12', 'end_date' => '2025-05-12'],
            ['title' => 'Id-ul-Zuha', 'start_date' => '2025-06-07', 'end_date' => '2025-06-07'],
            ['title' => 'Summer Vacation', 'start_date' => '2025-06-30', 'end_date' => '2025-07-11'],
            ['title' => 'Independence Day', 'start_date' => '2025-08-15', 'end_date' => '2025-08-15'],
            ['title' => 'Janmashtami', 'start_date' => '2025-08-16', 'end_date' => '2025-08-16'],
            ['title' => 'Milad-Un-Nabi / Id-e-Milad', 'start_date' => '2025-09-05', 'end_date' => '2025-09-05'],
            ['title' => 'Durga Puja', 'start_date' => '2025-09-29', 'end_date' => '2025-10-04'],
            ['title' => 'Diwali / Deepavali', 'start_date' => '2025-10-20', 'end_date' => '2025-10-21'],
            ['title' => 'Guru Nanak’s Birthday', 'start_date' => '2025-11-05', 'end_date' => '2025-11-05'],
            ['title' => 'State Inauguration Day', 'start_date' => '2025-12-01', 'end_date' => '2025-12-01'],
            ['title' => 'Winter Vacation', 'start_date' => '2025-12-15', 'end_date' => '2025-12-31'],
        ]);
    }
}
