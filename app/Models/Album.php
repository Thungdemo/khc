<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Album extends Model
{
    protected $fillable = [
        'title',
        'description'
    ];

    /**
     * Get the gallery images for the album.
     */
    public function galleryImages(): HasMany
    {
        return $this->hasMany(GalleryImage::class);
    }

    /**
     * Get the count of images in the album.
     */
    public function getImageCountAttribute(): int
    {
        return $this->galleryImages()->count();
    }
}
