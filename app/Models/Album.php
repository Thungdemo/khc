<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Album extends Model
{
    use HasFactory;
    
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

    public function coverImage()
    {
        return $this->hasOne(GalleryImage::class)->where('cover_image', true);
    }

    /**
     * Get the count of images in the album.
     */
    public function getImageCountAttribute(): int
    {
        return $this->galleryImages()->count();
    }
}
