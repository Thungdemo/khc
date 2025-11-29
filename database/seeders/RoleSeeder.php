<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::insert([
            ['id' => 1, 'name' => 'admin', 'display_name' => 'Admin','guard_name'=>'web','description' => 'Administrator with full access'],
            ['id' => 2, 'name' => 'cms', 'display_name' => 'CMS Manager','guard_name'=>'web','description' => 'Full access to uploading website content'],
            ['id' => 3, 'name' => 'notice', 'display_name' => 'Notice Board','guard_name'=>'web','description' => 'Access to uploading content to notice board'],
        ]);
    }
}
