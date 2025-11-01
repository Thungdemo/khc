<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Storage;

trait HasPhoto
{
    public function getPhotoColumn()
    {
        return property_exists($this, 'photoColumn') ? static::$photoColumn : 'photo';
    }

    public function savePhoto($file)
    {
        $filename = uniqid() . '.' . $file->guessExtension();
        $file->storeAs(self::$photoPath, $filename, 'public');
        $this->forceFill(([
            $this->getPhotoColumn() => self::$photoPath . '/' . $filename,
        ]))->save();
    }

    public function photoUrl()
    {
        return $this->photo ? asset('storage/' . $this->photo) : null;
    }

    public function deletePhoto()
    {
        if($this->photo)
        {
            Storage::disk('public')->delete($this->photo);
            $this->forceFill([
                $this->getPhotoColumn() => null,
            ])->save();
        }
    }

    public function delete()
    {
        $this->deletePhoto();
        parent::delete();
    }
}