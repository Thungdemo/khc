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
        $this->call(UserSeeder::class);
        $this->call(NoticeSeeder::class);
        $this->call(FormerJudgeSeeder::class);
        $this->call(GalleryImageSeeder::class);
        $this->call(ActivitySeeder::class);
        $this->call(RegistryOfficialSeeder::class);
        $this->call(AdvocateGeneralSeeder::class);
        $this->call(StatisticsSeeder::class);
        $this->call(FormDownloadSeeder::class);
        $this->call(LegalCommitteeSeeder::class);
        $this->call(AlbumSeeder::class);
        DB::commit();
    }
}
