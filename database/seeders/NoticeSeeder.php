<?php

namespace Database\Seeders;

use App\Models\Notice;
use App\Models\NoticeChild;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Mockery\Matcher\Not;

class NoticeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $notices = Notice::factory(100)->create();

        // Create 1 NoticeChild for every 10 notices seeded
        $notices->each(function ($notice, $index) {
            if (($index + 1) % 10 === 0) {
                NoticeChild::factory()->create([
                    'notice_id' => $notice->id,
                ]);
            }
        });
        Notice::factory()->withUrl()->count(100)->create();
    }
}
