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
        ])->assignRole('admin');
        $this->call(NoticeSeeder::class);
        DB::commit();
    }
}
