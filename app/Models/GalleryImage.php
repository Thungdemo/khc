<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class GalleryImage extends Model
{
    /** @use HasFactory<\Database\Factories\GalleryImageFactory> */
    use HasFactory;

    protected $guarded = [];

    public static $maxFileSize = 2000; // in KB

    public static $filePath = 'gallery-images';

    public function saveImage($file)
    {
        $filename = uniqid() . '.' . $file->guessExtension();
        $file->storeAs(self::$filePath, $filename, 'public');
        $this->forceFill(([
            'filename' => self::$filePath . '/' . $filename,
        ]))->save();
    }

    public function imageUrl()
    {
        return $this->filename ? asset('storage/' . $this->filename) : null;
    }

    public function deleteImage()
    {
        if($this->filename && strpos($this->filname,'dummy') === false)
        {
            Storage::disk('public')->delete($this->filename);
            $this->forceFill([
                'filename' => null,
            ])->save();
        }
    }

    public function delete()
    {
        $this->deleteImage();
        parent::delete();
    }
}
