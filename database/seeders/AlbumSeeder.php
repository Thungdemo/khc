<?php

namespace Database\Seeders;

use App\Models\Album;
use App\Models\GalleryImage;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AlbumSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Album::factory()->count(10)->create()->each(function ($album) {
            GalleryImage::factory()->count(5)->create([
                'album_id' => $album->id,
            ]);
        });
    }
}
