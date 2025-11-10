<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::beginTransaction();
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'admin@email.com',
            'password' => bcrypt('password'),
        ])->assignRole('admin');
        $this->call(NoticeSeeder::class);
        $this->call(FormerJudgeSeeder::class);
        $this->call(GalleryImageSeeder::class);
        $this->call(ActivitySeeder::class);
        $this->call(RegistryOfficialSeeder::class);
        $this->call(AdvocateGeneralSeeder::class);
        $this->call(StatisticsSeeder::class);
        DB::commit();
    }
}
